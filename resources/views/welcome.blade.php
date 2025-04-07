<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="icon" type="image/png" href="{{ asset('rv-favicon.png') }}">
    <meta charset="utf-8">
    <title>{{ config('app.name') }} - Welcome</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="antialiased">
    <livewire:welcome-page />
    @livewireScripts
</body>
</html>
