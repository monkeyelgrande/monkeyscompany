@extends('layouts.app')

@section('title', 'Servicios — Monkeys Company SAS')
@section('description', 'Venta de equipos, soporte técnico, desarrollo de software e insumos. Más de 15 años de experiencia tecnológica en el Sur de Bolívar.')

@section('content')

{{-- ============================== HERO ============================== --}}
<section class="relative py-section-padding px-margin-mobile md:px-margin-desktop overflow-hidden mesh-gradient-bg">
    <div class="max-w-container-max mx-auto relative z-10">
        <div class="max-w-3xl">
            <span class="inline-block bg-bg-pale text-primary px-4 py-2 rounded-full font-label-bold text-label-bold uppercase tracking-widest mb-6">Nuestro portafolio</span>
            <h1 class="font-headline-xl text-headline-xl-mobile md:text-headline-xl text-primary mb-8 leading-tight">
                Soluciones tecnológicas sin fronteras
            </h1>
            <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl">
                Impulsamos tu operación con infraestructura robusta, software a medida, soporte de élite e insumos siempre disponibles. Ingeniería de precisión hecha en Santa Rosa del Sur.
            </p>
        </div>
    </div>
    <div class="absolute right-0 top-0 w-1/3 h-full opacity-20 pointer-events-none hidden md:block">
        <svg class="w-full h-full text-secondary" fill="none" viewBox="0 0 400 800" xmlns="http://www.w3.org/2000/svg">
            <path d="M400 100H200V200H0M400 400H300V600H100V800" stroke="currentColor" stroke-width="2"/>
            <circle cx="200" cy="200" fill="currentColor" r="10"/>
            <circle cx="300" cy="400" fill="currentColor" r="10"/>
            <circle cx="100" cy="600" fill="#00D3FF" r="10"/>
        </svg>
    </div>
</section>

{{-- ============================== BENTO GRID ============================== --}}
<section class="py-section-padding px-margin-mobile md:px-margin-desktop bg-white">
    <div class="max-w-container-max mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-gutter">

            {{-- 1. Venta de equipos (feature grande) --}}
            <article class="md:col-span-8 group relative overflow-hidden rounded-3xl bg-primary border border-outline-variant/10 shadow-2xl min-h-[420px]">
                <picture>
                    <source srcset="{{ asset('img/photos/servicios-hero.webp') }}" type="image/webp">
                    <img src="{{ asset('img/photos/servicios-hero.jpg') }}"
                         alt="Laptop e impresora moderna sobre fondo cyan corporativo"
                         class="absolute inset-0 w-full h-full object-cover opacity-50 group-hover:scale-105 transition-transform duration-700"
                         loading="lazy">
                </picture>
                <div class="absolute inset-0 bg-gradient-to-t from-primary via-primary/70 to-primary/20"></div>
                <div class="relative h-full flex flex-col justify-end p-10 md:p-16">
                    <div class="flex items-center gap-4 mb-6">
                        <span class="material-symbols-outlined text-secondary-container" style="font-size: 32px">devices</span>
                        <div class="h-px w-12 bg-accent-orange"></div>
                    </div>
                    <h2 class="font-headline-lg text-headline-lg text-white mb-4">Venta de equipos y accesorios</h2>
                    <p class="font-body-md text-body-md text-white/80 max-w-xl mb-8">
                        Computadores, impresoras, UPS, periféricos y accesorios de marcas líderes con garantía oficial. Equipamiento listo para gaming, diseño, oficina y estaciones críticas.
                    </p>
                    <a href="{{ route('contacto') }}" class="inline-flex items-center text-accent-yellow font-label-bold text-label-bold uppercase tracking-widest hover:gap-3 transition-all gap-2">
                        Solicitar cotización
                        <span class="material-symbols-outlined">arrow_forward</span>
                    </a>
                </div>
            </article>

            {{-- 2. Soporte técnico --}}
            <article class="md:col-span-4 group relative overflow-hidden rounded-3xl bg-surface-container border border-outline-variant/30 hover:border-secondary transition-colors">
                <div class="h-48 overflow-hidden">
                    <picture>
                        <source srcset="{{ asset('img/photos/soporte-tecnico.webp') }}" type="image/webp">
                        <img src="{{ asset('img/photos/soporte-tecnico.jpg') }}"
                             alt="Técnico profesional inspeccionando equipo de red en centro de datos"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                             loading="lazy">
                    </picture>
                </div>
                <div class="p-8">
                    <span class="material-symbols-outlined text-secondary mb-4 block" style="font-size: 32px">build</span>
                    <h2 class="font-headline-md text-headline-md text-primary mb-3">Soporte y reparación</h2>
                    <p class="font-body-sm text-body-sm text-on-surface-variant mb-6">
                        Mantenimiento preventivo y correctivo de computadores, impresoras y redes con estándares internacionales.
                    </p>
                    <div class="flex flex-wrap gap-2">
                        @foreach(['Redes','Hardware','Impresoras'] as $tag)
                            <span class="px-3 py-1 bg-white border border-outline-variant/50 rounded-full text-[10px] font-label-bold uppercase tracking-widest text-primary">{{ $tag }}</span>
                        @endforeach
                    </div>
                </div>
            </article>

            {{-- 3. Desarrollo (glassmorphism) --}}
            <article class="md:col-span-6 group relative overflow-hidden rounded-3xl border border-secondary-container/30 bg-gradient-to-br from-secondary-fixed to-surface-container-high p-1">
                <div class="bg-white/80 backdrop-blur-xl rounded-[22px] h-full p-10 flex flex-col md:flex-row gap-8 items-center">
                    <div class="flex-1">
                        <div class="w-16 h-16 bg-primary rounded-2xl flex items-center justify-center mb-6">
                            <span class="material-symbols-outlined text-[#42d6ff]" style="font-size: 32px">code</span>
                        </div>
                        <h2 class="font-headline-lg text-headline-lg text-primary mb-4">Desarrollo web y software</h2>
                        <p class="font-body-md text-body-md text-on-surface-variant mb-8">
                            Sitios web modernos, e-commerce y aplicaciones de escritorio en Java diseñadas para escalar con tu negocio.
                        </p>
                        <a href="{{ route('contacto') }}" class="inline-flex items-center gap-2 bg-secondary text-white px-6 py-3 rounded-xl font-label-bold text-label-bold uppercase hover:shadow-lg transition-shadow">
                            Solicitar cotización
                            <span class="material-symbols-outlined">arrow_forward</span>
                        </a>
                    </div>
                    <div class="w-full md:w-1/3 aspect-square rounded-2xl overflow-hidden">
                        <picture>
                            <source srcset="{{ asset('img/photos/desarrollo-square.webp') }}" type="image/webp">
                            <img src="{{ asset('img/photos/desarrollo-square.jpg') }}"
                                 alt="Código de programación Java sobre monitor"
                                 class="w-full h-full object-cover"
                                 loading="lazy">
                        </picture>
                    </div>
                </div>
            </article>

            {{-- 4. Insumos --}}
            <article class="md:col-span-6 group relative overflow-hidden rounded-3xl bg-primary text-white p-10 md:p-12 min-h-[360px]">
                <div class="absolute right-[-10%] top-[-10%] w-64 h-64 bg-accent-orange/10 rounded-full blur-3xl group-hover:bg-accent-orange/20 transition-colors"></div>
                <div class="relative z-10 h-full flex flex-col">
                    <h2 class="font-headline-lg text-headline-lg mb-6 flex items-center">
                        <span class="material-symbols-outlined mr-4 text-accent-orange" style="font-size: 40px">inventory_2</span>
                        Insumos y suministros
                    </h2>
                    <div class="grid grid-cols-2 gap-4 mt-auto">
                        @foreach([
                            ['title'=>'Consumibles','desc'=>'Tintas, tóners y repuestos originales y compatibles certificados.'],
                            ['title'=>'Herramientas','desc'=>'Kits de limpieza y mantenimiento técnico especializado.'],
                        ] as $b)
                            <div class="bg-white/10 p-6 rounded-2xl border border-white/10 hover:border-accent-orange/50 transition-colors">
                                <h3 class="font-label-bold text-label-bold uppercase tracking-widest text-accent-orange mb-2">{{ $b['title'] }}</h3>
                                <p class="text-[14px] text-white/70">{{ $b['desc'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>

{{-- ============================== CTA ============================== --}}
<section class="py-section-padding px-margin-mobile md:px-margin-desktop mesh-gradient-bg">
    <div class="max-w-container-max mx-auto text-center bg-primary py-24 px-8 rounded-3xl relative overflow-hidden shadow-2xl">
        <div class="absolute inset-0 bg-gradient-to-r from-secondary/20 to-transparent"></div>
        <div class="relative z-10">
            <h2 class="font-headline-xl text-headline-xl-mobile md:text-headline-xl text-white mb-8">
                ¿Listo para evolucionar?
            </h2>
            <p class="font-body-lg text-body-lg text-white/70 max-w-2xl mx-auto mb-12">
                Nuestro equipo está listo para transformar tu infraestructura tecnológica. No busques un proveedor: encuentra un aliado estratégico.
            </p>
            <div class="flex flex-col md:flex-row justify-center items-center gap-6">
                <a href="https://wa.me/573138734449" target="_blank" rel="noopener"
                   class="bg-white text-primary px-10 py-5 rounded-xl font-headline-md text-headline-md hover:bg-accent-yellow transition-colors w-full md:w-auto inline-flex items-center justify-center gap-3">
                    Hablemos ahora <span class="material-symbols-outlined">chat</span>
                </a>
                <a href="{{ route('contacto') }}"
                   class="border border-white/30 text-white px-10 py-5 rounded-xl font-headline-md text-headline-md hover:bg-white/10 transition-colors w-full md:w-auto inline-flex items-center justify-center gap-3">
                    Escribir mensaje <span class="material-symbols-outlined">mail</span>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
