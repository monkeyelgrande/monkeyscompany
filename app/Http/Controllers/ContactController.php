<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Recibir un mensaje del formulario de Contacto y reenviarlo a gerencia@.
     * Por ahora el correo se loguea (MAIL_MAILER=log). Cuando esté configurado
     * el SMTP en el server, simplemente cambiar el driver en .env.
     */
    public function send(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'nombre'  => ['required', 'string', 'max:120'],
            'email'   => ['required', 'email', 'max:160'],
            'telefono' => ['nullable', 'string', 'max:40'],
            'asunto'  => ['nullable', 'string', 'max:160'],
            'mensaje' => ['required', 'string', 'max:5000'],
            // Honeypot anti-bots: si trae valor, descartamos silenciosamente
            'website' => ['nullable', 'string', 'max:0'],
        ]);

        $to = config('mail.contact_address', 'gerencia@monkeyscompany.com');

        Mail::raw(
            "Mensaje de contacto desde monkeyscompany.com\n\n"
            . "Nombre:   {$data['nombre']}\n"
            . "Email:    {$data['email']}\n"
            . "Teléfono: " . ($data['telefono'] ?? '—') . "\n"
            . "Asunto:   " . ($data['asunto'] ?? '—') . "\n\n"
            . "Mensaje:\n{$data['mensaje']}\n",
            function ($message) use ($data, $to) {
                $message
                    ->to($to)
                    ->replyTo($data['email'], $data['nombre'])
                    ->subject('[Web] ' . ($data['asunto'] ?? 'Nuevo mensaje de contacto'));
            }
        );

        Log::info('contact.form.submitted', [
            'email' => $data['email'],
            'asunto' => $data['asunto'] ?? null,
        ]);

        return back()
            ->with('status', '¡Gracias! Recibimos tu mensaje y te contactaremos pronto.')
            ->withInput($request->only('nombre'));
    }
}
