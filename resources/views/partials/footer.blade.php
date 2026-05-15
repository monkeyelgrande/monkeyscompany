<footer class="bg-primary w-full pt-section-padding pb-12 mt-section-padding">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-gutter px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">

        <div class="md:col-span-1">
            <img src="{{ asset('img/logo.png') }}" alt="Monkeys Company SAS" class="h-12 w-auto mb-6 brightness-0 invert">
            <p class="text-on-primary/70 font-body-sm text-body-sm mb-8">
                Líderes en soluciones tecnológicas en el Sur de Bolívar. Innovación y calidad al servicio de tu empresa.
            </p>
            <div class="flex gap-4">
                <a href="#" aria-label="Facebook" class="w-10 h-10 rounded-full border border-on-primary/20 flex items-center justify-center text-on-primary hover:bg-accent-orange transition-colors">
                    <span class="material-symbols-outlined" style="font-size: 18px">public</span>
                </a>
                <a href="#" aria-label="Instagram" class="w-10 h-10 rounded-full border border-on-primary/20 flex items-center justify-center text-on-primary hover:bg-accent-orange transition-colors">
                    <span class="material-symbols-outlined" style="font-size: 18px">photo_camera</span>
                </a>
                <a href="#" aria-label="YouTube" class="w-10 h-10 rounded-full border border-on-primary/20 flex items-center justify-center text-on-primary hover:bg-accent-orange transition-colors">
                    <span class="material-symbols-outlined" style="font-size: 18px">play_circle</span>
                </a>
                <a href="#" aria-label="Twitter / X" class="w-10 h-10 rounded-full border border-on-primary/20 flex items-center justify-center text-on-primary hover:bg-accent-orange transition-colors">
                    <span class="material-symbols-outlined" style="font-size: 18px">tag</span>
                </a>
            </div>
        </div>

        <div>
            <h4 class="font-label-bold text-label-bold text-on-primary mb-8 uppercase tracking-widest">Navegación</h4>
            <ul class="space-y-4">
                <li><a href="{{ route('home') }}" class="text-on-primary/70 hover:text-on-primary transition-all inline-flex items-center gap-2 hover:translate-x-1">Inicio</a></li>
                <li><a href="{{ route('servicios') }}" class="text-on-primary/70 hover:text-on-primary transition-all inline-flex items-center gap-2 hover:translate-x-1">Servicios</a></li>
                <li><a href="{{ route('nosotros') }}" class="text-on-primary/70 hover:text-on-primary transition-all inline-flex items-center gap-2 hover:translate-x-1">Nosotros</a></li>
                <li><a href="{{ route('contacto') }}" class="text-on-primary/70 hover:text-on-primary transition-all inline-flex items-center gap-2 hover:translate-x-1">Contacto</a></li>
            </ul>
        </div>

        <div>
            <h4 class="font-label-bold text-label-bold text-on-primary mb-8 uppercase tracking-widest">Legal</h4>
            <ul class="space-y-4">
                <li><a href="#" class="text-on-primary/70 hover:text-on-primary transition-all inline-flex items-center gap-2 hover:translate-x-1">Privacidad</a></li>
                <li><a href="#" class="text-on-primary/70 hover:text-on-primary transition-all inline-flex items-center gap-2 hover:translate-x-1">Términos</a></li>
                <li><a href="#" class="text-on-primary/70 hover:text-on-primary transition-all inline-flex items-center gap-2 hover:translate-x-1">Cookies</a></li>
            </ul>
        </div>

        <div>
            <h4 class="font-label-bold text-label-bold text-on-primary mb-8 uppercase tracking-widest">Contacto</h4>
            <div class="space-y-4">
                <div class="flex items-start gap-3">
                    <span class="material-symbols-outlined text-[#00D3FF] mt-0.5" style="font-size: 20px">location_on</span>
                    <span class="text-on-primary/70 font-body-sm text-body-sm">Carrera 12 N 10-15, Santa Rosa del Sur, Bolívar.</span>
                </div>
                <a href="https://wa.me/573138734449" target="_blank" rel="noopener" class="flex items-center gap-3 group">
                    <span class="material-symbols-outlined text-[#00D3FF]" style="font-size: 20px">phone</span>
                    <span class="text-on-primary/70 group-hover:text-on-primary transition-colors font-body-sm text-body-sm">(57) 313 873 4449</span>
                </a>
                <a href="mailto:gerencia@monkeyscompany.com" class="flex items-center gap-3 group">
                    <span class="material-symbols-outlined text-[#00D3FF]" style="font-size: 20px">mail</span>
                    <span class="text-on-primary/70 group-hover:text-on-primary transition-colors font-body-sm text-body-sm break-all">gerencia@monkeyscompany.com</span>
                </a>
            </div>
        </div>

    </div>
    <div class="border-t border-on-primary/10 mt-16 pt-8 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto text-center">
        <p class="text-on-primary/50 font-label-bold text-label-bold uppercase tracking-widest">
            © {{ date('Y') }} Monkeys Company SAS — Santa Rosa del Sur, Bolívar — (57) 313 873 4449
        </p>
    </div>
</footer>
