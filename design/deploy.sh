#!/bin/bash
# Deploy: actualizar la app desplegada desde el repo git.
# Ejecutar EN EL SERVIDOR de producción.
#
# Uso:
#   cd ~/laravel-app && bash design/deploy.sh
#
# Hace:
#   1. git pull
#   2. composer install (sin dev) si composer.lock cambió
#   3. npm ci + npm run build si package-lock.json cambió
#   4. Sincroniza ~/laravel-app/public/* → ~/public_html/ (preservando index.php absolute paths)
#   5. php artisan migrate (sin interactivo)
#   6. Re-cachea config / route / view
#
# IMPORTANTE: no toca ~/public_html/index.php (que tiene paths absolutos al laravel-app/)
set -euo pipefail

export PATH="$HOME/bin:$PATH"
export NVM_DIR="$HOME/.nvm"
[ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh"

APP_DIR="$HOME/laravel-app"
PUBLIC_DIR="$HOME/public_html"

echo "==> Pull desde GitHub"
cd "$APP_DIR"
COMPOSER_LOCK_BEFORE=$(md5sum composer.lock | awk '{print $1}')
PACKAGE_LOCK_BEFORE=$(md5sum package-lock.json 2>/dev/null | awk '{print $1}' || echo "")
git pull --ff-only

COMPOSER_LOCK_AFTER=$(md5sum composer.lock | awk '{print $1}')
PACKAGE_LOCK_AFTER=$(md5sum package-lock.json 2>/dev/null | awk '{print $1}' || echo "")

if [ "$COMPOSER_LOCK_BEFORE" != "$COMPOSER_LOCK_AFTER" ]; then
    echo "==> composer.lock cambió, reinstalando deps"
    composer install --no-dev --optimize-autoloader --no-interaction
fi

if [ "$PACKAGE_LOCK_BEFORE" != "$PACKAGE_LOCK_AFTER" ]; then
    echo "==> package-lock.json cambió, npm ci"
    npm ci --no-audit --no-fund
fi

echo "==> Build Vite (siempre, por si cambió código JS/CSS)"
npm run build

echo "==> Sincronizar archivos públicos a $PUBLIC_DIR"
# Backup el index.php (tiene paths absolutos modificados)
cp "$PUBLIC_DIR/index.php" "/tmp/index.php.bak"

# rsync con --delete para que assets antiguos se limpien
# Excluimos index.php para preservar nuestra versión modificada
rsync -a --delete \
    --exclude='index.php' \
    --exclude='icon/' \
    --exclude='awstats-icon' \
    --exclude='awstatsicons' \
    "$APP_DIR/public/" "$PUBLIC_DIR/"

# Restaurar nuestro index.php
cp "/tmp/index.php.bak" "$PUBLIC_DIR/index.php"

echo "==> Migrate (si hay nuevas)"
php artisan migrate --force --no-interaction

echo "==> Re-cachear"
php artisan config:clear  > /dev/null
php artisan route:clear   > /dev/null
php artisan view:clear    > /dev/null
php artisan config:cache  > /dev/null
php artisan route:cache   > /dev/null
php artisan view:cache    > /dev/null

echo "==> Permisos"
chmod -R 775 storage bootstrap/cache 2>/dev/null || true

echo "==> Smoke test"
for path in / /servicios /nosotros /contacto; do
    code=$(curl -s -o /dev/null -w '%{http_code}' --max-time 10 "https://monkeyscompany.com${path}")
    echo "  $code  $path"
done

echo "==> Deploy completo ✓"
