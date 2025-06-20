<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    @include('partials.head')
</head>
<body class="min-h-screen bg-gray-50 dark:bg-gray-900 antialiased">
<div class="flex min-h-screen">
    <!-- Linker helft: moderne hero sectie -->
    <div class="hidden lg:flex w-1/2 relative overflow-hidden bg-gradient-to-br from-indigo-600 via-purple-600 to-blue-700">
        <!-- Animated background particles -->
        <div class="absolute inset-0">
            <div class="absolute top-1/4 left-1/4 w-72 h-72 bg-white/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-purple-300/10 rounded-full blur-3xl animate-bounce" style="animation-duration: 3s;"></div>
            <div class="absolute top-1/2 left-1/3 w-48 h-48 bg-indigo-300/10 rounded-full blur-2xl animate-ping" style="animation-duration: 4s;"></div>
        </div>

        <!-- Floating code elements -->
        <div class="absolute top-20 left-10 opacity-20">
            <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 border border-white/20">
                <div class="space-y-2">
                    <div class="h-2 bg-orange-400 rounded w-16"></div>
                    <div class="h-2 bg-blue-400 rounded w-24"></div>
                    <div class="h-2 bg-green-400 rounded w-12"></div>
                </div>
            </div>
        </div>

        <div class="absolute bottom-32 right-12 opacity-20">
            <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3 border border-white/20">
                <div class="space-y-1">
                    <div class="h-1.5 bg-purple-400 rounded w-20"></div>
                    <div class="h-1.5 bg-pink-400 rounded w-14"></div>
                    <div class="h-1.5 bg-yellow-400 rounded w-18"></div>
                </div>
            </div>
        </div>

        <!-- Geometric shapes -->
        <div class="absolute top-1/3 right-1/4 w-8 h-8 bg-yellow-400/30 rotate-45 animate-spin" style="animation-duration: 8s;"></div>
        <div class="absolute bottom-1/3 left-1/6 w-6 h-6 bg-green-400/40 rounded-full animate-bounce" style="animation-duration: 2s;"></div>
        <div class="absolute top-1/6 left-1/2 w-4 h-4 bg-red-400/30 rotate-45"></div>

        <!-- Glassmorphism overlay -->
        <div class="absolute inset-0 backdrop-blur-sm bg-gradient-to-br from-white/5 via-transparent to-black/10"></div>

        <!-- Scheve rand rechts -->
        <svg class="absolute right-0 inset-y-0 h-full w-24 text-white dark:text-gray-800 transform translate-x-1/2 z-20" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
            <polygon points="50,0 100,0 50,100 0,100" />
        </svg>

        <!-- Main content -->
        <div class="relative z-10 flex flex-col justify-center items-center w-full h-full px-12 text-center">
            <!-- Logo with glow effect -->
            <div class="mb-8 relative group">
                <div class="absolute inset-0 bg-white/20 blur-xl rounded-full scale-150 group-hover:scale-[1.8] transition-transform duration-500"></div>
                <div class="relative bg-white/10 backdrop-blur-md p-6 rounded-3xl border border-white/20 hover:border-white/40 transition-all duration-300 hover:scale-110">
                    <img src="{{ asset('rv-favicon.png') }}" alt="RV Logo" class="h-20 w-20 mx-auto drop-shadow-2xl">
                </div>
            </div>

            <!-- Brand name with epic styling -->
            <div class="mb-6 space-y-2">
                <h1 class="text-5xl lg:text-6xl font-black text-white tracking-tight">
                <span class="bg-gradient-to-r from-white via-purple-100 to-indigo-100 bg-clip-text text-transparent drop-shadow-2xl">
                    RV Design
                </span>
                </h1>
                <h1 class="text-5xl lg:text-6xl font-black text-white tracking-tight -mt-2">
                <span class="bg-gradient-to-r from-indigo-100 via-purple-100 to-white bg-clip-text text-transparent drop-shadow-2xl">
                    & Development
                </span>
                </h1>
            </div>

            <!-- Slogan with typewriter effect -->
            <div class="mb-8">
                <p class="text-xl lg:text-2xl text-purple-100 font-light italic tracking-wide drop-shadow-lg">
                    <span class="animate-pulse">The engine behind your server</span>
                </p>
            </div>

            <!-- Cool decorative line -->
            <div class="w-32 h-1 bg-gradient-to-r from-transparent via-white/60 to-transparent rounded-full mb-8"></div>

            <!-- Tech stack icons floating -->
            <div class="flex space-x-6 opacity-70">
                <div class="w-12 h-12 bg-white/10 backdrop-blur-sm rounded-lg flex items-center justify-center border border-white/20 hover:border-white/40 transition-all duration-300 hover:scale-110 hover:bg-white/20">
                    <span class="text-white font-bold text-lg">&lt;/&gt;</span>
                </div>
                <div class="w-12 h-12 bg-white/10 backdrop-blur-sm rounded-lg flex items-center justify-center border border-white/20 hover:border-white/40 transition-all duration-300 hover:scale-110 hover:bg-white/20">
                    <span class="text-white font-bold text-lg">⚡</span>
                </div>
                <div class="w-12 h-12 bg-white/10 backdrop-blur-sm rounded-lg flex items-center justify-center border border-white/20 hover:border-white/40 transition-all duration-300 hover:scale-110 hover:bg-white/20">
                    <span class="text-white font-bold text-lg">🚀</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Rechter helft: formulier -->
    <div class="flex w-full lg:w-1/2 items-center justify-center p-6 md:p-10 bg-white dark:bg-gray-800">
        <div class="w-full max-w-md">
            <!-- Header voor mobiel -->
            <div class="lg:hidden text-center mb-8">
                <div class="flex items-center justify-center space-x-3 mb-4">
                    <div class="w-10 h-10 bg-indigo-600 rounded-lg flex items-center justify-center">
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <span class="text-xl font-bold text-gray-900 dark:text-white">YourSaaS</span>
                </div>
            </div>

            <!-- Form content slot -->
            <div class="space-y-6">
                {{ $slot }}
            </div>

            <!-- Footer links -->
            <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                <div class="flex flex-wrap items-center justify-center gap-4 text-sm">
                    <a href="#" class="text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300 transition-colors">
                        Hulp nodig?
                    </a>
                    <span class="text-gray-300 dark:text-gray-600">•</span>
                    <a href="#" class="text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300 transition-colors">
                        Privacybeleid
                    </a>
                    <span class="text-gray-300 dark:text-gray-600">•</span>
                    <a href="#" class="text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300 transition-colors">
                        Voorwaarden
                    </a>
                </div>

                <!-- Copyright -->
                <div class="text-center mt-4 text-xs text-gray-500 dark:text-gray-400">
                    © 2025 RV Design & Development. Alle rechten voorbehouden.
                </div>
            </div>
        </div>
    </div>
</div>

@fluxScripts
</body>
</html>
