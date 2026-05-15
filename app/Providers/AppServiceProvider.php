<?php

namespace App\Providers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\Mailer\Transport\Dsn;
use Symfony\Component\Mailer\Transport\Smtp\EsmtpTransportFactory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Custom 'smtp' transport que desactiva la verificación de peer name del cert TLS.
        //
        // En el servidor de producción (Virtualmin compartido) el MTA local tiene cert
        // para 'cloudatadns.xyz' pero nos conectamos a 'localhost', causando mismatch
        // en el handshake. Como la conexión es localhost → localhost dentro del mismo
        // servidor, es seguro saltarse la verificación del peer name.
        //
        // Esta extensión NO se usa cuando MAIL_MAILER=sendmail (transporte por defecto
        // en .env de producción), pero queda lista por si en algún momento volvemos a SMTP.
        Mail::extend('smtp', function (array $config) {
            $factory = new EsmtpTransportFactory();

            $scheme = $config['scheme']
                ?? (((int) ($config['port'] ?? 0)) === 465 ? 'smtps' : 'smtp');

            $transport = $factory->create(new Dsn(
                $scheme,
                $config['host'] ?? '127.0.0.1',
                $config['username'] ?? null,
                $config['password'] ?? null,
                $config['port'] ?? null,
                array_filter([
                    'local_domain' => $config['local_domain'] ?? null,
                ]),
            ));

            $transport->getStream()->setStreamOptions([
                'ssl' => [
                    'verify_peer'       => false,
                    'verify_peer_name'  => false,
                    'allow_self_signed' => true,
                ],
            ]);

            return $transport;
        });
    }
}
