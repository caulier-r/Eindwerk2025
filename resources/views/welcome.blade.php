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

    <script>
        const userPref = localStorage.getItem('theme');
        const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

        if (userPref === 'dark' || (!userPref && systemPrefersDark)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }

        document.getElementById('dark-mode-toggle')?.addEventListener('click', () => {
            document.documentElement.classList.toggle('dark');
            const isDark = document.documentElement.classList.contains('dark');
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
        });

    </script>

</body>
</html>
