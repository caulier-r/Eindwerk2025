<div class="py-8">
    <h1 class="text-3xl font-bold text-center mb-2">Kies je abonnement</h1>
    <p class="text-gray-600 text-center mb-8">Vind het perfecte plan voor jouw behoeften</p>

    <div class="grid md:grid-cols-3 gap-6 max-w-6xl mx-auto">
        @foreach ($plans as $plan)
            <div class="border rounded-2xl p-6 text-center shadow-lg hover:shadow-xl transition-all duration-300 bg-white relative overflow-hidden transform hover:-translate-y-1
                @if($plan->name === 'Pro') ring-2 ring-indigo-500 @endif">

                @if($plan->name === 'Pro')
                    <div class="absolute top-0 right-0 bg-indigo-500 text-white text-xs font-bold px-3 py-1 rounded-bl-lg">
                        Populair
                    </div>
                @endif

                <div class="w-16 h-16 bg-indigo-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                    </svg>
                </div>

                <h2 class="text-2xl font-bold mb-2">{{ $plan->name }}</h2>
                <div class="text-indigo-600 font-bold text-3xl mb-2">€{{ number_format($plan->price, 2) }}</div>
                <p class="text-gray-500 text-sm mb-6">per maand</p>

                <div class="border-t border-b py-4 mb-6">
                    @foreach(explode(',', $plan->features) as $feature)
                        <div class="flex items-center justify-center mb-2">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-600">{{ trim($feature) }}</span>
                        </div>
                    @endforeach
                </div>

                @auth
                    <form method="POST" action="{{ route('checkout', $plan) }}">
                        @csrf
                        <button class="w-full bg-indigo-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-indigo-700 transition-colors duration-300 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Abonneren
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="w-full block bg-gray-200 text-gray-800 px-6 py-3 rounded-lg font-medium hover:bg-gray-300 transition-colors duration-300 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                        Inloggen om te abonneren
                    </a>
                @endauth
            </div>
        @endforeach
    </div>

    <div class="mt-12 text-center text-gray-600 max-w-lg mx-auto">
        <p class="text-sm">Alle abonnementen omvatten 30 dagen geld-terug garantie, 24/7 ondersteuning en gratis updates.</p>
    </div>
</div>
