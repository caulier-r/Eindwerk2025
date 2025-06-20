<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <link rel="icon" type="image/png" href="{{ asset('rv-favicon.png') }}">
    <meta charset="utf-8">
    <title>{{ config('app.name') }} - </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white overflow-x-hidden">

<!-- navbar -->
<livewire:nav-bar />

<!-- Main Content -->
<main class="pt-16">
    {{ $slot }}
</main>

<!-- Footer -->
<x-footer/>

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
