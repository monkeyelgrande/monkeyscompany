<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Añade cabeceras de seguridad a todas las respuestas.
 *
 * Estos headers idealmente los pone Apache vía mod_headers en .htaccess,
 * pero en el servidor compartido de Virtualmin mod_headers no está habilitado.
 * Este middleware es el plan B garantizado.
 */
class SecurityHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // HSTS - forzar HTTPS por 1 año (solo cuando ya estamos en HTTPS).
        // No incluimos 'preload' hasta registrar el dominio en hstspreload.org.
        if ($request->isSecure()) {
            $response->headers->set(
                'Strict-Transport-Security',
                'max-age=31536000; includeSubDomains'
            );
        }

        // Anti-clickjacking
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');

        // Prevenir MIME sniffing
        $response->headers->set('X-Content-Type-Options', 'nosniff');

        // Referrer policy - referrer completo solo a mismo origen
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');

        // Permissions Policy - denegar sensores que no usamos
        $response->headers->set(
            'Permissions-Policy',
            'camera=(), microphone=(), geolocation=(), interest-cohort=(), payment=()'
        );

        // X-XSS-Protection (deprecated pero algunos scanners aún lo piden)
        $response->headers->set('X-XSS-Protection', '1; mode=block');

        // Content-Security-Policy
        // Permite explícitamente solo los orígenes que el sitio realmente usa:
        //   - Material Symbols CSS de fonts.googleapis.com
        //   - Fuentes en fonts.gstatic.com
        //   - iframe de Google Maps embed en /contacto
        // script-src queda estricto ('self' solo) porque el sitio NO tiene JS custom.
        // style-src incluye 'unsafe-inline' porque las views usan style="font-size: ..."
        // inline para tamaños de iconos Material Symbols. Sin user-generated content
        // inyectable, es un compromiso aceptable.
        $csp = implode('; ', [
            "default-src 'self'",
            "script-src 'self'",
            "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com",
            "font-src 'self' https://fonts.gstatic.com",
            "img-src 'self' data:",
            "frame-src https://www.google.com",
            "connect-src 'self'",
            "base-uri 'self'",
            "form-action 'self'",
            "frame-ancestors 'self'",
            "object-src 'none'",
            "upgrade-insecure-requests",
        ]);
        $response->headers->set('Content-Security-Policy', $csp);

        // Quitar X-Powered-By para no exponer la versión de PHP
        $response->headers->remove('X-Powered-By');

        return $response;
    }
}
