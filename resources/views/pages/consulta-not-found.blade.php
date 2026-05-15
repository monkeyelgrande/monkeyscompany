@extends('layouts.app')

@section('title', 'Orden no encontrada — Monkeys Company')
@section('description', 'El QR consultado no corresponde a ninguna orden registrada.')

@section('content')
<div class="mesh-gradient-bg min-h-[80vh]">
    <section class="px-margin-mobile md:px-margin-desktop max-w-2xl mx-auto py-20 md:py-28 text-center">

        <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-error/10 text-error mb-6">
            <span class="material-symbols-outlined" style="font-size:48px;">qr_code_scanner</span>
        </div>

        <h1 class="font-headline-xl text-headline-xl-mobile md:text-headline-lg text-primary leading-tight mb-4">
            QR no válido
        </h1>

        <p class="font-body-lg text-body-lg text-on-surface-variant max-w-xl mx-auto mb-3">
            No encontramos ninguna orden de servicio asociada a este código.
        </p>
        <p class="text-sm text-on-surface-variant max-w-xl mx-auto mb-10">
            Es posible que el código esté dañado, la orden haya sido eliminada o el QR pertenezca a otra empresa.
        </p>

        <div class="flex flex-col sm:flex-row gap-3 justify-center">
            <a href="https://wa.me/573138734449?text={{ rawurlencode('Hola, escaneé un QR pero no aparece mi orden. ¿Pueden ayudarme?') }}"
               target="_blank" rel="noopener"
               class="inline-flex items-center justify-center gap-2 bg-success text-brand-dark font-semibold px-6 py-3 rounded-full hover:opacity-90 transition ambient-shadow">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                    <path d="M.057 24l1.687-6.163a11.867 11.867 0 01-1.587-5.946C.16 5.335 5.495 0 12.05 0a11.817 11.817 0 018.413 3.488 11.824 11.824 0 013.48 8.414c-.003 6.557-5.338 11.892-11.893 11.892a11.9 11.9 0 01-5.688-1.448L.057 24zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884a9.86 9.86 0 001.599 5.391l.236.375-1.04 3.797 3.894-1.022.375.234zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.149-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                </svg>
                Escribir por WhatsApp
            </a>
            <a href="{{ route('home') }}"
               class="inline-flex items-center justify-center gap-2 bg-white border border-outline-variant text-on-surface font-semibold px-6 py-3 rounded-full hover:bg-surface-container-low transition">
                Ir al inicio
            </a>
        </div>

    </section>
</div>
@endsection
