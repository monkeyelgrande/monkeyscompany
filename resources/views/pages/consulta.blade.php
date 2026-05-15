@extends('layouts.app')

@section('title', 'Consulta de reparación — Monkeys Company')
@section('description', 'Estado de tu equipo en reparación con Monkeys Company SAS.')

@section('content')
<div class="mesh-gradient-bg min-h-[80vh]">
    <section class="px-margin-mobile md:px-margin-desktop max-w-3xl mx-auto py-16 md:py-20">

        <div class="text-center mb-10">
            <p class="text-label-bold uppercase tracking-widest text-on-surface-variant">Orden N° {{ $order->external_id }}</p>
            <h1 class="font-headline-xl text-headline-xl-mobile md:text-headline-lg text-primary mt-2 leading-tight">
                Estado de tu reparación
            </h1>
        </div>

        {{-- Estado actual destacado --}}
        <div class="glass-card rounded-xl p-6 md:p-8 mb-6 text-center ambient-shadow">
            <p class="text-on-surface-variant text-sm mb-3">Estado actual</p>
            <div class="inline-flex items-center px-5 py-2 rounded-full font-headline tracking-wide text-2xl {{ $order->statusBadgeClass() }}">
                {{ $order->status_label }}
            </div>
            @if ($order->delivered_at)
                <p class="mt-4 text-sm text-on-surface-variant">
                    Entregado el {{ $order->delivered_at->isoFormat('D [de] MMMM, YYYY') }}
                </p>
            @elseif ($order->promised_at)
                <p class="mt-4 text-sm text-on-surface-variant">
                    Fecha estimada de entrega: <strong>{{ $order->promised_at->isoFormat('D [de] MMMM, YYYY') }}</strong>
                </p>
            @endif
        </div>

        {{-- Detalles --}}
        <div class="bg-white rounded-xl border border-outline-variant ambient-shadow p-6 md:p-8 mb-6">
            <h2 class="font-headline text-2xl mb-5">Detalles del equipo</h2>
            <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                <div>
                    <dt class="text-on-surface-variant">Cliente</dt>
                    <dd class="font-semibold">{{ $order->customer_name }}</dd>
                </div>
                <div>
                    <dt class="text-on-surface-variant">Equipo</dt>
                    <dd class="font-semibold">{{ $order->equipment }}</dd>
                </div>
                @if ($order->serial)
                    <div>
                        <dt class="text-on-surface-variant">Serial</dt>
                        <dd class="font-mono text-xs">{{ $order->serial }}</dd>
                    </div>
                @endif
                @if ($order->technician_name)
                    <div>
                        <dt class="text-on-surface-variant">Técnico</dt>
                        <dd class="font-semibold">{{ $order->technician_name }}</dd>
                    </div>
                @endif
                <div>
                    <dt class="text-on-surface-variant">Ingresado</dt>
                    <dd class="font-semibold">{{ $order->received_at->isoFormat('D [de] MMMM, YYYY') }}</dd>
                </div>
                @if ($order->promised_at)
                    <div>
                        <dt class="text-on-surface-variant">Fecha compromiso</dt>
                        <dd class="font-semibold">{{ $order->promised_at->isoFormat('D [de] MMMM, YYYY') }}</dd>
                    </div>
                @endif
            </dl>

            @if ($order->problem)
                <div class="mt-6 pt-6 border-t border-outline-variant">
                    <h3 class="text-on-surface-variant text-sm mb-1">Reportado</h3>
                    <p class="text-sm leading-relaxed">{{ $order->problem }}</p>
                </div>
            @endif

            @if ($order->public_notes)
                <div class="mt-4">
                    <h3 class="text-on-surface-variant text-sm mb-1">Notas del técnico</h3>
                    <p class="text-sm leading-relaxed">{{ $order->public_notes }}</p>
                </div>
            @endif
        </div>

        {{-- Línea de tiempo --}}
        @if ($order->history->isNotEmpty())
            <div class="bg-white rounded-xl border border-outline-variant ambient-shadow p-6 md:p-8">
                <h2 class="font-headline text-2xl mb-5">Línea de tiempo</h2>
                <ol class="relative border-l-2 border-brand-pale ml-2 space-y-5">
                    @foreach ($order->history as $event)
                        <li class="ml-6">
                            <span class="absolute -left-[7px] flex items-center justify-center w-3 h-3 rounded-full bg-brand-cyan ring-4 ring-white"></span>
                            <div class="text-sm">
                                <div class="font-semibold">{{ $event->status_label }}</div>
                                <div class="text-on-surface-variant text-xs mt-0.5">
                                    {{ $event->changed_at->isoFormat('D [de] MMMM, YYYY · HH:mm') }}
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ol>
            </div>
        @endif

        @php
            $waMessage = "Hola, requiero información de la orden N° {$order->external_id} ({$order->equipment}).";
            $waUrl = 'https://wa.me/573138734449?text='.rawurlencode($waMessage);
        @endphp

        <div class="mt-10 text-center">
            <a href="{{ $waUrl }}" target="_blank" rel="noopener"
               class="inline-flex items-center gap-2 bg-success text-brand-dark font-semibold px-6 py-3 rounded-full hover:opacity-90 transition ambient-shadow">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                    <path d="M.057 24l1.687-6.163a11.867 11.867 0 01-1.587-5.946C.16 5.335 5.495 0 12.05 0a11.817 11.817 0 018.413 3.488 11.824 11.824 0 013.48 8.414c-.003 6.557-5.338 11.892-11.893 11.892a11.9 11.9 0 01-5.688-1.448L.057 24zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884a9.86 9.86 0 001.599 5.391l.236.375-1.04 3.797 3.894-1.022.375.234zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.149-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                </svg>
                Contactar por WhatsApp
            </a>
            <p class="text-xs text-on-surface-variant mt-4">
                También puedes escribirnos a
                <a href="mailto:gerencia@monkeyscompany.com" class="text-brand-mid underline">gerencia@monkeyscompany.com</a>.
            </p>
        </div>

    </section>
</div>
@endsection
