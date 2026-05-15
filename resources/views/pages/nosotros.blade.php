@extends('layouts.app')

@section('title', 'Nosotros — Monkeys Company SAS')
@section('description', 'Más de 15 años transformando la tecnología del Sur de Bolívar. Conoce nuestra historia, misión, visión y valores.')

@section('content')

{{-- ============================== HERO ============================== --}}
<section class="relative overflow-hidden pt-section-padding pb-section-padding mesh-gradient">
    <div class="px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-gutter items-center">
            <div>
                <span class="inline-block font-label-bold text-label-bold uppercase tracking-widest text-secondary bg-secondary-container/30 px-4 py-2 rounded-full mb-6">Desde 2009</span>
                <h1 class="font-headline-xl text-headline-xl-mobile md:text-headline-xl text-primary mb-8 max-w-2xl leading-tight">
                    Tecnología en evolución en Santa Rosa del Sur
                </h1>
                <p class="font-body-lg text-body-lg text-on-surface-variant mb-10 max-w-xl">
                    Por más de 15 años, hemos sido el corazón digital de Bolívar, transformando desafíos complejos en soluciones elegantes para empresas, instituciones y emprendedores de la región.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="#historia" class="bg-primary text-on-primary px-8 py-4 rounded-xl font-label-bold text-label-bold uppercase ambient-shadow hover:-translate-y-1 transition-transform inline-flex items-center gap-2">
                        Explora nuestro viaje <span class="material-symbols-outlined">south</span>
                    </a>
                    <a href="{{ route('contacto') }}" class="border border-secondary text-secondary px-8 py-4 rounded-xl font-label-bold text-label-bold uppercase hover:bg-secondary/5 transition-colors">
                        Hablar con nosotros
                    </a>
                </div>
            </div>
            <div class="relative mt-12 lg:mt-0">
                <div class="absolute -inset-4 bg-gradient-to-tr from-secondary-container to-transparent rounded-3xl opacity-20 blur-2xl"></div>
                <picture>
                    <source srcset="{{ asset('img/photos/nosotros-hero.webp') }}" type="image/webp">
                    <img src="{{ asset('img/photos/nosotros-hero.jpg') }}"
                         alt="Sala de reuniones moderna con vista panorámica de la ciudad"
                         class="rounded-3xl shadow-2xl relative z-10 border border-outline-variant/30 w-full aspect-[4/3] object-cover"
                         loading="eager" fetchpriority="high">
                </picture>
            </div>
        </div>
    </div>
</section>

{{-- ============================== HISTORIA / TIMELINE ============================== --}}
<section id="historia" class="py-section-padding bg-surface">
    <div class="px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-end mb-24 gap-6">
            <h2 class="font-headline-lg text-headline-lg text-primary max-w-lg">Nuestro camino evolutivo</h2>
            <p class="font-body-md text-body-md text-on-surface-variant max-w-md">
                Crónica de una visión que comenzó en Bolívar y que hoy escala para servir a empresas en toda Colombia.
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 relative">
            <div class="hidden md:block absolute top-12 left-0 right-0 h-px bg-outline-variant/30 z-0"></div>

            @foreach([
                ['year'=>'2009','bg'=>'bg-primary-container','color'=>'text-on-primary-container','title'=>'La fundación','desc'=>'Nace en Santa Rosa del Sur como pionera tecnológica local, enfocada en conectar los negocios rurales con el mundo digital.'],
                ['year'=>'2017','bg'=>'bg-secondary','color'=>'text-white','title'=>'Crecimiento regional','desc'=>'Ampliamos nuestra cobertura a empresas del Sur de Bolívar y desarrollamos soluciones a medida en software y redes.'],
                ['year'=>date('Y'),'bg'=>'bg-accent-orange','color'=>'text-white','title'=>'Nueva etapa','desc'=>'Como Monkeys Company SAS, consolidamos venta, soporte, desarrollo e insumos en una sola marca al servicio de Colombia.'],
            ] as $milestone)
                <div class="relative z-10">
                    <div class="w-24 h-24 rounded-full {{ $milestone['bg'] }} flex items-center justify-center mb-8 ambient-shadow">
                        <span class="font-headline-sm text-headline-sm {{ $milestone['color'] }}">{{ $milestone['year'] }}</span>
                    </div>
                    <h3 class="font-headline-sm text-headline-sm text-primary mb-4 uppercase">{{ $milestone['title'] }}</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant">{{ $milestone['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================== MISIÓN & VISIÓN ============================== --}}
<section class="relative py-section-padding overflow-hidden">
    <div class="absolute inset-0 bg-primary z-0"></div>
    <div class="absolute inset-0 mesh-gradient-hero opacity-50 z-0"></div>
    <div class="px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-gutter text-on-primary">

            <div class="glass-card p-12 rounded-3xl">
                <span class="material-symbols-outlined text-secondary mb-6" style="font-size: 48px">rocket_launch</span>
                <h2 class="font-headline-lg text-headline-lg text-primary mb-6 uppercase">Misión</h2>
                <p class="font-body-lg text-body-lg text-on-surface-variant">
                    Empoderar a empresas e instituciones del Sur de Bolívar con soluciones tecnológicas inteligentes y accesibles, cerrando la brecha entre los requisitos digitales modernos y las realidades de nuestra región.
                </p>
            </div>

            <div class="glass-card p-12 rounded-3xl">
                <span class="material-symbols-outlined text-accent-orange mb-6" style="font-size: 48px">visibility</span>
                <h2 class="font-headline-lg text-headline-lg text-primary mb-6 uppercase">Visión</h2>
                <p class="font-body-lg text-body-lg text-on-surface-variant">
                    Ser, para 2030, el aliado tecnológico de referencia en el Sur de Bolívar, reconocidos por la calidad de nuestro servicio, el respaldo a nuestra comunidad y la capacidad de escalar soluciones a nivel nacional.
                </p>
            </div>
        </div>
    </div>
</section>

{{-- ============================== VALORES ============================== --}}
<section class="py-section-padding bg-background">
    <div class="px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
        <h2 class="font-headline-lg text-headline-lg text-primary text-center mb-24 uppercase tracking-tight">Nuestros valores fundamentales</h2>

        <div class="grid grid-cols-1 md:grid-cols-12 gap-gutter">

            <article class="md:col-span-8 glass-card p-10 rounded-3xl ambient-shadow flex flex-col md:flex-row gap-10 items-center overflow-hidden group">
                <div class="flex-1">
                    <span class="material-symbols-outlined text-secondary mb-4 block" style="font-size: 40px">lightbulb</span>
                    <h3 class="font-headline-md text-headline-md text-primary mb-4 uppercase">Innovación</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant">
                        No solo seguimos las tendencias, las definimos. Exploramos nuevas tecnologías para construir herramientas duraderas, prácticas y útiles para nuestra región.
                    </p>
                </div>
                <div class="w-full md:w-1/2 aspect-video rounded-2xl overflow-hidden">
                    <picture>
                        <source srcset="{{ asset('img/photos/innovacion.webp') }}" type="image/webp">
                        <img src="{{ asset('img/photos/innovacion.jpg') }}"
                             alt="Patrón abstracto de placa de circuitos en perspectiva 3D con tonos cyan"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                             loading="lazy">
                    </picture>
                </div>
            </article>

            <article class="md:col-span-4 bg-primary-container p-10 rounded-3xl flex flex-col justify-end text-on-primary-container overflow-hidden relative group">
                <div class="absolute top-0 right-0 p-8 opacity-20">
                    <span class="material-symbols-outlined text-on-primary-container" style="font-size: 120px; font-variation-settings: 'FILL' 1;">shield</span>
                </div>
                <div class="relative z-10">
                    <h3 class="font-headline-md text-headline-md mb-4 uppercase">Responsabilidad</h3>
                    <p class="font-body-md text-body-md">
                        La integridad es la base de nuestro trabajo. Asumimos la plena propiedad de cada sistema y cada cliente que nos confía su tecnología.
                    </p>
                </div>
            </article>

            <article class="md:col-span-12 glass-card p-10 rounded-3xl ambient-shadow grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <picture>
                    <source srcset="{{ asset('img/photos/profesionalismo.webp') }}" type="image/webp">
                    <img src="{{ asset('img/photos/profesionalismo.jpg') }}"
                         alt="Equipo diverso de profesionales colaborando en una mesa de trabajo moderna"
                         class="rounded-2xl w-full h-[300px] object-cover"
                         loading="lazy">
                </picture>
                <div>
                    <h3 class="font-headline-md text-headline-md text-primary mb-4 uppercase">Profesionalismo</h3>
                    <p class="font-body-lg text-body-lg text-on-surface-variant mb-6">
                        Cada línea de código y cada interacción con el cliente se manejan con la precisión esperada en estándares globales. Representamos lo mejor de Bolívar ante el mundo.
                    </p>
                    <ul class="space-y-3">
                        @foreach(['Garantía en cada trabajo','Soporte personalizado','Compromiso con la región'] as $bullet)
                            <li class="flex items-center gap-3 font-label-bold text-label-bold text-secondary uppercase">
                                <span class="material-symbols-outlined" style="font-size: 18px">check_circle</span>
                                {{ $bullet }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </article>
        </div>
    </div>
</section>

{{-- ============================== QUOTE / CIERRE ============================== --}}
<section class="py-section-padding mesh-gradient border-y border-outline-variant/20">
    <div class="px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto text-center">
        <div class="mb-12 flex justify-center">
            <div class="w-24 h-1 bg-primary"></div>
        </div>
        <h2 class="font-headline-xl text-headline-xl-mobile md:text-headline-xl text-primary mb-12 max-w-4xl mx-auto leading-tight">
            "No solo vendemos tecnología: construimos relaciones de largo plazo con cada cliente del Sur de Bolívar."
        </h2>
        <div class="flex flex-col items-center">
            <div class="w-20 h-20 rounded-full border-2 border-secondary p-1 mb-4 bg-bg-pale flex items-center justify-center">
                <span class="material-symbols-outlined text-secondary" style="font-size: 36px">person</span>
            </div>
            <span class="font-headline-sm text-headline-sm text-primary uppercase">Equipo Directivo</span>
            <span class="font-label-bold text-label-bold text-secondary uppercase tracking-widest">Monkeys Company SAS</span>
        </div>
    </div>
</section>

@endsection
