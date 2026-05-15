@extends('layouts.app')

@section('title', 'Contacto — Monkeys Company SAS')
@section('description', 'Escríbenos, llámanos o visítanos en Santa Rosa del Sur, Bolívar. Te respondemos en menos de 24 horas.')

@section('content')

<div class="mesh-gradient-bg">

    {{-- ============================== HERO ============================== --}}
    <section class="px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto py-16 md:py-24">
        <h1 class="font-headline-xl text-headline-xl-mobile md:text-headline-xl text-primary mb-6 leading-tight">
            Ponte en contacto
        </h1>
        <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl">
            ¿Listo para elevar tu proyecto? Conéctate con nuestro equipo. Te respondemos en menos de 24 horas.
        </p>
    </section>

    {{-- ============================== SPLIT: INFO + FORM ============================== --}}
    <section class="px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto pb-section-padding">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-gutter items-start">

            {{-- IZQUIERDA: datos + mapa --}}
            <div class="space-y-12">
                <div class="space-y-8">
                    <h2 class="font-headline-md text-headline-md text-primary mb-2">Nuestro hábitat</h2>

                    <div class="flex items-start gap-4">
                        <span class="material-symbols-outlined text-secondary mt-1" style="font-size: 28px">location_on</span>
                        <div>
                            <p class="font-label-bold text-label-bold uppercase tracking-widest text-primary mb-1">Sede</p>
                            <p class="font-body-md text-body-md text-on-surface-variant">Carrera 12 N 10-15<br>Santa Rosa del Sur, Bolívar, Colombia</p>
                        </div>
                    </div>

                    <a href="https://wa.me/573138734449" target="_blank" rel="noopener" class="flex items-start gap-4 group">
                        <span class="material-symbols-outlined text-secondary mt-1" style="font-size: 28px">call</span>
                        <div>
                            <p class="font-label-bold text-label-bold uppercase tracking-widest text-primary mb-1">Teléfono / WhatsApp</p>
                            <p class="font-body-md text-body-md text-on-surface-variant group-hover:text-primary transition-colors">(57) 313 873 4449</p>
                        </div>
                    </a>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <a href="mailto:gerencia@monkeyscompany.com" class="flex items-start gap-4 group">
                            <span class="material-symbols-outlined text-secondary mt-1" style="font-size: 24px">mail</span>
                            <div>
                                <p class="font-label-bold text-label-bold uppercase tracking-widest text-primary mb-1">Gerencia</p>
                                <p class="font-body-sm text-body-sm text-on-surface-variant break-all group-hover:text-primary transition-colors">gerencia@monkeyscompany.com</p>
                            </div>
                        </a>
                        <a href="mailto:facturacion@monkeyscompany.com" class="flex items-start gap-4 group">
                            <span class="material-symbols-outlined text-secondary mt-1" style="font-size: 24px">receipt_long</span>
                            <div>
                                <p class="font-label-bold text-label-bold uppercase tracking-widest text-primary mb-1">Facturación</p>
                                <p class="font-body-sm text-body-sm text-on-surface-variant break-all group-hover:text-primary transition-colors">facturacion@monkeyscompany.com</p>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Mapa Google Maps embebido --}}
                <div class="relative w-full h-[400px] rounded-3xl overflow-hidden border border-outline-variant/30 shadow-sm">
                    <iframe
                        src="https://www.google.com/maps?q=Carrera+12+%23+10-15,+Santa+Rosa+del+Sur,+Bol%C3%ADvar,+Colombia&output=embed"
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                        class="absolute inset-0 w-full h-full border-0"
                        title="Mapa - Monkeys Company SAS, Santa Rosa del Sur"></iframe>
                    <div class="absolute bottom-6 left-6 bg-surface-container-lowest/90 backdrop-blur-md px-6 py-4 rounded-2xl shadow-lg border border-outline-variant/20 pointer-events-none">
                        <p class="font-label-bold text-label-bold uppercase tracking-widest text-primary mb-1">Sede central</p>
                        <p class="font-body-sm text-body-sm text-on-surface-variant">Santa Rosa del Sur, Colombia</p>
                    </div>
                </div>

                {{-- Redes sociales --}}
                <div>
                    <p class="font-label-bold text-label-bold uppercase tracking-widest text-primary mb-4">Síguenos</p>
                    <div class="flex gap-4">
                        @foreach([
                            ['icon'=>'public',       'label'=>'Facebook'],
                            ['icon'=>'photo_camera', 'label'=>'Instagram'],
                            ['icon'=>'smart_display','label'=>'YouTube'],
                            ['icon'=>'tag',          'label'=>'X / Twitter'],
                        ] as $r)
                            <a href="#" aria-label="{{ $r['label'] }}"
                               class="w-12 h-12 flex items-center justify-center rounded-xl bg-surface-container hover:bg-secondary-container transition-colors text-on-surface-variant hover:text-on-secondary-container">
                                <span class="material-symbols-outlined" style="font-size: 22px">{{ $r['icon'] }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- DERECHA: formulario --}}
            <div class="bg-bg-pale rounded-[40px] p-8 md:p-12 shadow-sm border border-secondary-fixed relative overflow-hidden">
                <div class="absolute -top-24 -right-24 w-64 h-64 bg-cyan-400/20 rounded-full blur-3xl pointer-events-none"></div>

                <div class="relative z-10">
                    <h2 class="font-headline-md text-headline-md text-primary mb-2">Envíanos un mensaje</h2>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-10">
                        Describe brevemente lo que necesitas y te responderemos en un plazo de 24 horas.
                    </p>

                    @if(session('status'))
                        <div class="mb-6 p-5 rounded-2xl bg-success/15 border border-success/40 text-on-surface flex items-start gap-3" style="background: rgba(112, 224, 0, 0.12);">
                            <span class="material-symbols-outlined text-[#3a8c00]" style="font-size: 24px">check_circle</span>
                            <p class="font-body-md text-body-md">{{ session('status') }}</p>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="mb-6 p-5 rounded-2xl bg-error-container border border-error/30 text-on-error-container">
                            <p class="font-label-bold text-label-bold uppercase mb-2">Revisa estos campos:</p>
                            <ul class="list-disc list-inside font-body-sm text-body-sm space-y-1">
                                @foreach($errors->all() as $e)
                                    <li>{{ $e }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('contacto.send') }}" method="POST" class="space-y-6" novalidate>
                        @csrf

                        {{-- Honeypot anti-bots --}}
                        <input type="text" name="website" tabindex="-1" autocomplete="off"
                               class="absolute -left-[9999px] opacity-0 pointer-events-none" aria-hidden="true">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="nombre" class="font-label-bold text-label-bold uppercase tracking-widest text-primary px-1">Nombre</label>
                                <input id="nombre" name="nombre" type="text" required maxlength="120"
                                       value="{{ old('nombre') }}"
                                       placeholder="Nombre Apellido"
                                       class="w-full bg-surface-container-lowest border border-outline-variant rounded-xl px-6 py-4 font-body-md text-body-md focus:ring-2 focus:ring-secondary focus:border-transparent outline-none transition-all">
                            </div>
                            <div class="space-y-2">
                                <label for="email" class="font-label-bold text-label-bold uppercase tracking-widest text-primary px-1">Correo</label>
                                <input id="email" name="email" type="email" required maxlength="160"
                                       value="{{ old('email') }}"
                                       placeholder="tucorreo@empresa.com"
                                       class="w-full bg-surface-container-lowest border border-outline-variant rounded-xl px-6 py-4 font-body-md text-body-md focus:ring-2 focus:ring-secondary focus:border-transparent outline-none transition-all">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="telefono" class="font-label-bold text-label-bold uppercase tracking-widest text-primary px-1">Teléfono <span class="text-on-surface-variant normal-case">(opcional)</span></label>
                                <input id="telefono" name="telefono" type="tel" maxlength="40"
                                       value="{{ old('telefono') }}"
                                       placeholder="(57) 300 000 0000"
                                       class="w-full bg-surface-container-lowest border border-outline-variant rounded-xl px-6 py-4 font-body-md text-body-md focus:ring-2 focus:ring-secondary focus:border-transparent outline-none transition-all">
                            </div>
                            <div class="space-y-2">
                                <label for="asunto" class="font-label-bold text-label-bold uppercase tracking-widest text-primary px-1">Asunto</label>
                                <input id="asunto" name="asunto" type="text" maxlength="160"
                                       value="{{ old('asunto') }}"
                                       placeholder="Consulta sobre…"
                                       class="w-full bg-surface-container-lowest border border-outline-variant rounded-xl px-6 py-4 font-body-md text-body-md focus:ring-2 focus:ring-secondary focus:border-transparent outline-none transition-all">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="mensaje" class="font-label-bold text-label-bold uppercase tracking-widest text-primary px-1">Mensaje</label>
                            <textarea id="mensaje" name="mensaje" rows="5" required maxlength="5000"
                                      placeholder="Cuéntanos sobre tu proyecto, necesidad de soporte o cotización…"
                                      class="w-full bg-surface-container-lowest border border-outline-variant rounded-xl px-6 py-4 font-body-md text-body-md focus:ring-2 focus:ring-secondary focus:border-transparent outline-none transition-all resize-y">{{ old('mensaje') }}</textarea>
                        </div>

                        <button type="submit"
                                class="w-full bg-primary text-on-primary py-5 rounded-xl font-label-bold text-label-bold uppercase tracking-widest flex items-center justify-center gap-3 group transition-all hover:shadow-xl active:scale-[0.98]">
                            Enviar mensaje
                            <span class="material-symbols-outlined transition-transform group-hover:translate-x-1">send</span>
                        </button>

                        <p class="font-body-sm text-body-sm text-on-surface-variant text-center">
                            O escríbenos directo a
                            <a href="https://wa.me/573138734449" target="_blank" rel="noopener" class="text-secondary font-bold hover:underline">WhatsApp</a>.
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
