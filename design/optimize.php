<?php
/**
 * Optimiza imágenes de Envato para uso web.
 * - Resize: cover-crop al aspecto del slot
 * - Output: .webp (calidad 78) + .jpg fallback (calidad 82)
 * - Destino: public/img/photos/
 *
 * Uso: php design/optimize.php
 */

declare(strict_types=1);
ini_set('memory_limit', '1024M');

$root   = dirname(__DIR__);
$srcDir = $root . '/design/envato';
$outDir = $root . '/public/img/photos';

if (!is_dir($outDir)) {
    mkdir($outDir, 0755, true);
}

$jobs = [
    // Hero Inicio - 4:5 vertical
    ['out' => 'hero-inicio',       'w' => 1200, 'h' => 1500, 'src' => 'slot1-hero-inicio.jpg'],
    // Card Venta de equipos - 16:9 (half card)
    ['out' => 'venta-equipos',     'w' => 1280, 'h' => 720,  'src' => 'slot2-venta-equipos.jpg'],
    // Card Desarrollo Web - 16:9 (half card)
    ['out' => 'desarrollo-web',    'w' => 1280, 'h' => 720,  'src' => 'macro-shot-of-the-command-line-on-the-monitor-of-t-2026-03-24-00-44-31-utc.jpg'],
    // Servicios hero - amplio horizontal (large feature card)
    ['out' => 'servicios-hero',    'w' => 1920, 'h' => 1080, 'src' => 'modern-printer-with-paper-and-laptop-on-table-in-o-2026-03-23-23-40-12-utc.jpg'],
    // Soporte técnico - 16:9 (top half of small card)
    ['out' => 'soporte-tecnico',   'w' => 1280, 'h' => 720,  'src' => 'good-looking-cheerful-professional-in-safety-vest-2026-03-12-22-38-11-utc.jpg'],
    // Desarrollo cuadrado - 1:1 (reusa fuente del slot 3)
    ['out' => 'desarrollo-square', 'w' => 800,  'h' => 800,  'src' => 'macro-shot-of-the-command-line-on-the-monitor-of-t-2026-03-24-00-44-31-utc.jpg'],
    // Nosotros hero - 4:3
    ['out' => 'nosotros-hero',     'w' => 1600, 'h' => 1200, 'src' => 'modern-meeting-room-with-city-view-2026-01-05-06-13-49-utc.jpg'],
    // Innovación - 16:9 (video aspect)
    ['out' => 'innovacion',        'w' => 1280, 'h' => 720,  'src' => 'blue-circuit-board-technology-background-image-2026-03-10-02-05-01-utc.jpg'],
    // Profesionalismo - 3:2
    ['out' => 'profesionalismo',   'w' => 1500, 'h' => 1000, 'src' => 'business-people-working-in-team-at-office-2026-01-08-00-14-18-utc.jpg'],
];

$totalIn = 0;
$totalOut = 0;
$rows = [];

foreach ($jobs as $job) {
    $srcPath = $srcDir . '/' . $job['src'];
    if (!is_file($srcPath)) {
        echo "[SKIP] missing: {$job['src']}\n";
        continue;
    }
    $srcSize = filesize($srcPath);
    $totalIn += $srcSize;

    // Cargar
    $src = imagecreatefromjpeg($srcPath);
    if (!$src) {
        echo "[ERR] cannot load: {$job['src']}\n";
        continue;
    }

    $sw = imagesx($src);
    $sh = imagesy($src);

    $tw = $job['w'];
    $th = $job['h'];

    // Cover-crop: encontrar la región del fuente que cubra el aspecto del destino
    $srcRatio = $sw / $sh;
    $dstRatio = $tw / $th;

    if ($srcRatio > $dstRatio) {
        // Fuente más ancha → recortamos los lados
        $cropH = $sh;
        $cropW = (int) round($sh * $dstRatio);
        $cropX = (int) round(($sw - $cropW) / 2);
        $cropY = 0;
    } else {
        // Fuente más alta → recortamos arriba/abajo
        $cropW = $sw;
        $cropH = (int) round($sw / $dstRatio);
        $cropX = 0;
        $cropY = (int) round(($sh - $cropH) / 2);
    }

    $dst = imagecreatetruecolor($tw, $th);
    imagecopyresampled($dst, $src, 0, 0, $cropX, $cropY, $tw, $th, $cropW, $cropH);

    // JPG
    $jpgPath = $outDir . '/' . $job['out'] . '.jpg';
    imagejpeg($dst, $jpgPath, 82);
    $jpgSize = filesize($jpgPath);

    // WebP
    $webpPath = $outDir . '/' . $job['out'] . '.webp';
    imagewebp($dst, $webpPath, 78);
    $webpSize = filesize($webpPath);

    imagedestroy($src);
    imagedestroy($dst);

    $totalOut += $jpgSize + $webpSize;
    $rows[] = sprintf(
        "%-22s %5dx%-4d  src %6.1fMB → jpg %5.0fKB + webp %5.0fKB (%.0f%%)",
        $job['out'], $tw, $th,
        $srcSize / 1048576,
        $jpgSize / 1024,
        $webpSize / 1024,
        100 * ($jpgSize + $webpSize) / $srcSize
    );
}

echo "\n=== Optimización terminada ===\n";
foreach ($rows as $r) echo $r . "\n";
echo "\nTotal entrada:  " . number_format($totalIn / 1048576, 2) . " MB\n";
echo "Total salida:   " . number_format($totalOut / 1048576, 2) . " MB\n";
echo "Reducción:      " . number_format(100 * (1 - $totalOut / $totalIn), 1) . "%\n";
