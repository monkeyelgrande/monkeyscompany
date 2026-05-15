@extends('layouts.app')

@section('title', 'Monkeys Company SAS — Impulsando tu tecnología por más de 15 años')
@section('description', 'Soluciones integrales en soporte técnico, desarrollo de software y venta de equipos de alto rendimiento en Santa Rosa del Sur, Bolívar.')

@section('content')

{{-- ============================== HERO ============================== --}}
<header class="relative mesh-gradient-hero stripe-slant pt-24 pb-48 px-margin-mobile md:px-margin-desktop overflow-hidden">
    <div class="max-w-container-max mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

        <div class="relative z-10">
            <span class="inline-block bg-white/10 text-[#42d6ff] font-label-bold text-label-bold py-2 px-4 rounded-full border border-white/20 mb-6 uppercase tracking-widest">
                Tecnología de Vanguardia
            </span>
            <h1 class="font-headline-xl text-headline-xl-mobile md:text-headline-xl text-white mb-8 leading-tight">
                Impulsando tu tecnología por más de 15 años
            </h1>
            <p class="font-body-lg text-body-lg text-white/80 mb-10 max-w-xl">
                Soluciones integrales en soporte técnico, desarrollo de software y venta de equipos de alto rendimiento. Transformamos la complejidad técnica en ventaja competitiva.
            </p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="https://wa.me/573138734449" target="_blank" rel="noopener"
                   class="bg-[#00D3FF] text-primary font-label-bold text-label-bold uppercase px-10 py-5 rounded-xl flex items-center justify-center gap-2 hover:opacity-90 transition-opacity active:scale-95 duration-200 shadow-xl shadow-cyan-500/20">
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">chat</span>
                    Hablar con un experto
                </a>
                <a href="#servicios"
                   class="border border-white/30 text-white font-label-bold text-label-bold uppercase px-10 py-5 rounded-xl flex items-center justify-center hover:bg-white/10 transition-colors">
                    Explorar Servicios
                </a>
            </div>
        </div>

        <div class="relative hidden lg:block">
            <div class="absolute -top-20 -right-20 w-96 h-96 bg-cyan-400/20 blur-[100px] rounded-full"></div>
            <picture>
                <source srcset="{{ asset('img/photos/hero-inicio.webp') }}" type="image/webp">
                <img src="{{ asset('img/photos/hero-inicio.jpg') }}"
                     alt="Centro de datos moderno con racks de servidores iluminados en azul"
                     class="relative rounded-3xl shadow-2xl border border-white/10 transform rotate-3 hover:rotate-0 transition-transform duration-700 w-full aspect-[4/5] object-cover"
                     loading="eager" fetchpriority="high">
            </picture>
        </div>
    </div>
</header>

{{-- ============================== STATS ============================== --}}
<section class="relative -mt-24 px-margin-mobile md:px-margin-desktop z-20">
    <div class="max-w-container-max mx-auto grid grid-cols-1 md:grid-cols-3 gap-gutter">

        @foreach([
            ['icon' => 'home_repair_service', 'value' => '5,000+', 'label' => 'Equipos reparados'],
            ['icon' => 'web',                  'value' => '250+',   'label' => 'Sitios web creados'],
            ['icon' => 'developer_mode',       'value' => '80+',    'label' => 'Aplicaciones desarrolladas'],
        ] as $stat)
            <div class="glass-card p-10 rounded-3xl ambient-shadow flex flex-col items-center text-center card-lift">
                <span class="material-symbols-outlined text-secondary mb-4" style="font-size: 48px">{{ $stat['icon'] }}</span>
                <div class="font-headline-lg text-headline-lg text-primary">{{ $stat['value'] }}</div>
                <div class="font-label-bold text-label-bold text-on-surface-variant uppercase tracking-widest">{{ $stat['label'] }}</div>
            </div>
        @endforeach

    </div>
</section>

{{-- ============================== SERVICIOS (BENTO) ============================== --}}
<section id="servicios" class="py-section-padding px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">

    <div class="text-center mb-20">
        <h2 class="font-headline-lg text-headline-lg mb-4">Nuestros Servicios Especializados</h2>
        <div class="h-1.5 w-24 bg-secondary mx-auto rounded-full"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-12 md:grid-rows-2 gap-8 md:h-[800px]">

        {{-- Venta de equipos --}}
        <article class="md:col-span-8 md:row-span-1 group relative overflow-hidden rounded-3xl border border-bg-pale bg-white flex flex-col md:flex-row items-center ambient-shadow hover:-translate-y-2 transition-transform duration-300">
            <div class="p-10 md:w-1/2">
                <span class="text-secondary font-label-bold text-label-bold uppercase tracking-widest block mb-4">Retail Tech</span>
                <h3 class="font-headline-md text-headline-md mb-4">Venta de Equipos</h3>
                <p class="text-on-surface-variant mb-6">Computadores, impresoras, UPS y periféricos. Hardware de alto rendimiento con garantía oficial y respaldo de marca.</p>
                <a href="{{ route('servicios') }}" class="text-secondary font-bold flex items-center gap-2 group-hover:gap-4 transition-all">
                    Ver catálogo <span class="material-symbols-outlined">arrow_forward</span>
                </a>
            </div>
            <div class="h-64 md:h-full md:w-1/2 w-full overflow-hidden">
                <picture>
                    <source srcset="{{ asset('img/photos/venta-equipos.webp') }}" type="image/webp">
                    <img src="{{ asset('img/photos/venta-equipos.jpg') }}"
                         alt="Monitor profesional con software de análisis de negocio sobre escritorio corporativo"
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                         loading="lazy">
                </picture>
            </div>
        </article>

        {{-- Soporte técnico (tall card) --}}
        <article class="md:col-span-4 md:row-span-2 group relative overflow-hidden rounded-3xl border border-bg-pale bg-primary text-white ambient-shadow hover:-translate-y-2 transition-transform duration-300">
            <div class="p-10 h-full flex flex-col">
                <div class="bg-white/10 w-16 h-16 rounded-2xl flex items-center justify-center mb-8">
                    <span class="material-symbols-outlined text-white" style="font-size: 32px">build</span>
                </div>
                <h3 class="font-headline-md text-headline-md mb-4">Soporte Técnico</h3>
                <p class="text-white/70 mb-8">Mantenimiento preventivo y correctivo de computadores, impresoras y redes. Recuperación de datos y optimización de sistemas críticos.</p>
                <div class="mt-auto space-y-4 relative z-10">
                    @foreach(['Respuesta inmediata','Servicio a domicilio','Diagnóstico el mismo dia'] as $feat)
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-[#00D3FF]" style="font-size: 20px">check_circle</span>
                            <span class="font-label-bold text-label-bold uppercase">{{ $feat }}</span>
                        </div>
                    @endforeach
                </div>
                <div class="pointer-events-none absolute -right-20 -bottom-20 opacity-10">
                    <span class="material-symbols-outlined" style="font-size: 300px">settings</span>
                </div>
            </div>
        </article>

        {{-- Desarrollo --}}
        <article class="md:col-span-8 md:row-span-1 group relative overflow-hidden rounded-3xl border border-bg-pale bg-white flex flex-col md:flex-row-reverse items-center ambient-shadow hover:-translate-y-2 transition-transform duration-300">
            <div class="p-10 md:w-1/2">
                <span class="text-secondary font-label-bold text-label-bold uppercase tracking-widest block mb-4">Software Solutions</span>
                <h3 class="font-headline-md text-headline-md mb-4">Desarrollo Web &amp; Apps</h3>
                <p class="text-on-surface-variant mb-6">Sitios corporativos, aplicaciones de escritorio en Java y soluciones a medida. Tecnología escalable para tu operación.</p>
                <a href="{{ route('servicios') }}" class="text-secondary font-bold flex items-center gap-2 group-hover:gap-4 transition-all">
                    Conocer más <span class="material-symbols-outlined">arrow_forward</span>
                </a>
            </div>
            <div class="h-64 md:h-full md:w-1/2 w-full overflow-hidden">
                <picture>
                    <source srcset="{{ asset('img/photos/desarrollo-web.webp') }}" type="image/webp">
                    <img src="{{ asset('img/photos/desarrollo-web.jpg') }}"
                         alt="Código de programación Java en monitor con resaltado de sintaxis"
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                         loading="lazy">
                </picture>
            </div>
        </article>
    </div>

    {{-- 4ta categoría: Insumos --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter mt-8">
        @foreach([
            ['icon' => 'print',          'tag' => 'Suministros', 'title' => 'Tintas y tóneres',    'desc' => 'Originales y compatibles certificados para todas las marcas.'],
            ['icon' => 'cable',          'tag' => 'Repuestos',   'title' => 'Cables y conectores', 'desc' => 'Stock permanente de cables de datos, video y energía.'],
            ['icon' => 'handyman',       'tag' => 'Herramientas','title' => 'Herramientas técnicas','desc' => 'Equipo profesional para mantenimiento e instalaciones.'],
        ] as $item)
            <div class="bg-white border border-bg-pale rounded-2xl p-8 card-lift ambient-shadow">
                <span class="material-symbols-outlined text-secondary mb-4" style="font-size: 36px">{{ $item['icon'] }}</span>
                <span class="text-secondary font-label-bold text-label-bold uppercase tracking-widest block mb-2">{{ $item['tag'] }}</span>
                <h3 class="font-headline-sm text-headline-sm mb-2">{{ $item['title'] }}</h3>
                <p class="text-on-surface-variant font-body-sm text-body-sm">{{ $item['desc'] }}</p>
            </div>
        @endforeach
    </div>
</section>

{{-- ============================== CTA GRANDE ============================== --}}
<section class="py-section-padding px-margin-mobile md:px-margin-desktop bg-surface-container-low overflow-hidden relative">
    <div class="absolute inset-0 bg-primary opacity-[0.02] -skew-y-3 transform origin-right"></div>
    <div class="max-w-container-max mx-auto text-center relative z-10">
        <h2 class="font-headline-xl text-headline-xl-mobile md:text-headline-xl mb-6">
            ¿Tu negocio está listo para el siguiente nivel?
        </h2>
        <p class="font-body-lg text-body-lg text-on-surface-variant mb-12 max-w-2xl mx-auto">
            No dejes que los problemas técnicos detengan tu crecimiento. Agenda una consultoría gratuita con nuestros especialistas hoy mismo.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="https://wa.me/573138734449" target="_blank" rel="noopener"
               class="bg-primary text-on-primary font-headline-md text-headline-md px-12 py-6 rounded-2xl hover:bg-secondary transition-all active:scale-95 shadow-2xl inline-flex items-center justify-center gap-4">
                Contáctanos por WhatsApp
                <span class="material-symbols-outlined">send</span>
            </a>
            <a href="{{ route('contacto') }}"
               class="bg-white border border-bg-pale text-primary font-headline-md text-headline-md px-12 py-6 rounded-2xl hover:bg-bg-pale transition-all active:scale-95 inline-flex items-center justify-center gap-4">
                Escribir mensaje
                <span class="material-symbols-outlined">forward_to_inbox</span>
            </a>
        </div>
    </div>
</section>

@endsection
