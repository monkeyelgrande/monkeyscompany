<nav class="sticky top-0 w-full z-50 bg-surface/80 backdrop-blur-xl border-b border-outline-variant/20 shadow-sm">
    <div class="flex justify-between items-center h-20 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">

        <a href="{{ route('home') }}" class="flex items-center gap-3" aria-label="Monkeys Company SAS — Inicio">
            <img src="{{ asset('img/logo.png') }}" alt="Monkeys Company SAS" class="h-12 w-auto">
        </a>

        {{-- Links de escritorio --}}
        <div class="hidden md:flex items-center gap-8">
            @php
                $links = [
                    ['route' => 'home',      'label' => 'Inicio'],
                    ['route' => 'servicios', 'label' => 'Servicios'],
                    ['route' => 'nosotros',  'label' => 'Nosotros'],
                    ['route' => 'contacto',  'label' => 'Contacto'],
                ];
            @endphp
            @foreach($links as $l)
                @php $active = request()->routeIs($l['route']); @endphp
                <a href="{{ route($l['route']) }}"
                   class="font-label-bold text-label-bold uppercase transition-colors
                          @if($active) text-secondary font-bold border-b-2 border-secondary pb-1
                          @else text-on-surface-variant hover:text-primary
                          @endif">
                    {{ $l['label'] }}
                </a>
            @endforeach
        </div>

        <a href="https://wa.me/573138734449"
           target="_blank" rel="noopener"
           class="hidden sm:inline-block bg-primary text-on-primary px-8 py-4 rounded-xl font-label-bold text-label-bold uppercase hover:opacity-80 transition-opacity active:scale-95 duration-200">
            ¿Listo para empezar?
        </a>

        {{-- Toggle mobile (solo visual; abre menú con detalle) --}}
        <details class="md:hidden relative">
            <summary class="list-none cursor-pointer p-2 rounded-lg hover:bg-surface-container-low" aria-label="Abrir menú">
                <span class="material-symbols-outlined text-on-surface">menu</span>
            </summary>
            <div class="absolute right-0 top-full mt-2 w-56 bg-surface-container-lowest rounded-xl shadow-xl border border-outline-variant/30 py-2">
                @foreach($links as $l)
                    <a href="{{ route($l['route']) }}"
                       class="block px-5 py-3 font-label-bold text-label-bold uppercase
                              @if(request()->routeIs($l['route'])) text-secondary
                              @else text-on-surface hover:bg-surface-container-low
                              @endif">
                        {{ $l['label'] }}
                    </a>
                @endforeach
                <a href="https://wa.me/573138734449" target="_blank" rel="noopener"
                   class="block mx-3 mt-2 text-center bg-primary text-on-primary px-4 py-3 rounded-xl font-label-bold text-label-bold uppercase">
                    Hablar por WhatsApp
                </a>
            </div>
        </details>
    </div>
</nav>
