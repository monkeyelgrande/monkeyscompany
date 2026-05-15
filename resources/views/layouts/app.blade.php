<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Monkeys Company SAS — Impulsando tu tecnología')</title>
    <meta name="description" content="@yield('description', 'Soluciones integrales en soporte técnico, desarrollo de software y venta de equipos. Más de 15 años impulsando la tecnología del Sur de Bolívar.')">

    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">

    {{-- Material Symbols Outlined --}}
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background text-on-surface font-body-md overflow-x-hidden antialiased">

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

</body>
</html>
