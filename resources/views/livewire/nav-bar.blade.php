<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="bg-indigo-700 dark:bg-indigo-900 shadow-lg"
         x-data="{
        darkMode: localStorage.getItem('darkMode') === 'dark' ||
                (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches),
        mobileMenuOpen: false,
        userMenuOpen: false
    }"
         x-init="
        $watch('darkMode', val => {
            if (val) {
                document.documentElement.classList.add('dark');
                localStorage.setItem('darkMode', 'dark');
            } else {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('darkMode', 'light');
            }
        });
        if(darkMode) {
            document.documentElement.classList.add('dark');
        }
    ">
        <!-- Navbar container -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo and navigation links -->
                <div class="flex items-center">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('home') }}" class="flex items-center">
                            <img src="{{ asset('rv-favicon.png') }}" class="h-10 w-auto">
                            <span class="ml-2 text-white font-semibold hidden sm:inline text-lg">RV Design & Development</span>
                        </a>
                    </div>

                    <!-- Desktop navigation links -->
                    <div class="hidden md:ml-8 md:flex md:space-x-4">
                        <a href="{{ route('highlights') }}" class="px-3 py-2 text-sm font-medium rounded-md bg-white dark:bg-indigo-600 text-indigo-700 dark:text-white hover:bg-indigo-50 dark:hover:bg-indigo-700 transition-colors duration-200 shadow-sm">
                            Highlights
                        </a>
                        <a href="{{ route('products') }}" class="px-3 py-2 text-sm font-medium rounded-md bg-white dark:bg-indigo-600 text-indigo-700 dark:text-white hover:bg-indigo-50 dark:hover:bg-indigo-700 transition-colors duration-200 shadow-sm">
                            Products
                        </a>
                    </div>
                </div>

                <!-- Right side buttons -->
                <div class="hidden md:flex md:items-center md:space-x-4">
                    <!-- Theme toggle button -->
                    <button @click="darkMode = !darkMode" wire:click="toggleDarkMode" class="px-3 py-2 text-sm font-medium rounded-md bg-white dark:bg-indigo-600 text-indigo-700 dark:text-white hover:bg-indigo-50 dark:hover:bg-indigo-700 transition-colors duration-200 shadow-sm flex items-center">
                        <template x-if="darkMode">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </template>
                        <template x-if="!darkMode">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                            </svg>
                        </template>
                        <span x-text="darkMode ? 'Light Mode' : 'Dark Mode'"></span>
                    </button>

                    <!-- Auth navigation -->
                    @auth
                        <!-- User dropdown -->
                        <div class="relative ml-3" x-data="{ open: false }">
                            <div>
                                <button @click="open = !open" type="button" class="flex items-center px-3 py-2 text-sm font-medium rounded-md bg-white dark:bg-indigo-600 text-indigo-700 dark:text-white hover:bg-indigo-50 dark:hover:bg-indigo-700 transition-colors duration-200 shadow-sm" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="mr-2">{{ Auth::user()->name }}</span>
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                            <div x-show="open"
                                 @click.away="open = false"
                                 x-transition:enter="transition ease-out duration-100"
                                 x-transition:enter-start="transform opacity-0 scale-95"
                                 x-transition:enter-end="transform opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="transform opacity-100 scale-100"
                                 x-transition:leave-end="transform opacity-0 scale-95"
                                 class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white dark:bg-gray-800 py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                 style="display: none;"
                                 role="menu"
                                 aria-orientation="vertical"
                                 aria-labelledby="user-menu-button"
                                 tabindex="-1">
                                <a href="{{ route('my-plugins') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700" role="menuitem">My Plugins</a>
                                <a href="{{ route('invoices') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700" role="menuitem">Invoices</a>
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700" role="menuitem">Profile Settings</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700" role="menuitem">
                                        Log Out
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="px-3 py-2 text-sm font-medium rounded-md bg-white dark:bg-indigo-600 text-indigo-700 dark:text-white hover:bg-indigo-50 dark:hover:bg-indigo-700 transition-colors duration-200 shadow-sm">
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="px-3 py-2 text-sm font-medium rounded-md bg-indigo-500 text-white hover:bg-indigo-600 transition-colors duration-200 shadow-sm">
                            Register
                        </a>
                    @endauth
                </div>

                <!-- Mobile menu button -->
                <div class="flex items-center md:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" :class="{ 'hidden': mobileMenuOpen, 'block': !mobileMenuOpen }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg class="hidden h-6 w-6" :class="{ 'block': mobileMenuOpen, 'hidden': !mobileMenuOpen }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state -->
        <div x-show="mobileMenuOpen"
             x-transition:enter="transition ease-out duration-100"
             x-transition:enter-start="transform opacity-0 scale-95"
             x-transition:enter-end="transform opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-75"
             x-transition:leave-start="transform opacity-100 scale-100"
             x-transition:leave-end="transform opacity-0 scale-95"
             class="md:hidden"
             id="mobile-menu"
             style="display: none;">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-indigo-800 dark:bg-indigo-900">
                <a href="{{ route('highlights') }}" class="block px-3 py-2 rounded-md text-white font-medium hover:bg-indigo-600 dark:hover:bg-indigo-700">
                    Highlights
                </a>
                <a href="{{ route('products') }}" class="block px-3 py-2 rounded-md text-white font-medium hover:bg-indigo-600 dark:hover:bg-indigo-700">
                    Products
                </a>
                <button @click="darkMode = !darkMode" wire:click="toggleDarkMode" class="w-full text-left flex items-center px-3 py-2 rounded-md text-white font-medium hover:bg-indigo-600 dark:hover:bg-indigo-700">
                    <template x-if="darkMode">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </template>
                    <template x-if="!darkMode">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                    </template>
                    <span x-text="darkMode ? 'Light Mode' : 'Dark Mode'"></span>
                </button>

                @auth
                    <span class="block px-3 py-2 rounded-md text-white font-medium border-b border-indigo-600 dark:border-indigo-700">
                    {{ Auth::user()->name }}
                </span>
                    <a href="{{ route('my-plugins') }}" class="block px-3 py-2 rounded-md text-white font-medium hover:bg-indigo-600 dark:hover:bg-indigo-700">
                        My Plugins
                    </a>
                    <a href="{{ route('invoices') }}" class="block px-3 py-2 rounded-md text-white font-medium hover:bg-indigo-600 dark:hover:bg-indigo-700">
                        Invoices
                    </a>
                    <a href="{{ route('profile.edit') }}" class="block px-3 py-2 rounded-md text-white font-medium hover:bg-indigo-600 dark:hover:bg-indigo-700">
                        Profile Settings
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left block px-3 py-2 rounded-md text-white font-medium hover:bg-indigo-600 dark:hover:bg-indigo-700">
                            Log Out
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="block px-3 py-2 rounded-md text-white font-medium hover:bg-indigo-600 dark:hover:bg-indigo-700">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="block px-3 py-2 rounded-md text-white font-medium hover:bg-indigo-600 dark:hover:bg-indigo-700">
                        Register
                    </a>
                @endauth
            </div>
        </div>

        <!-- Dark mode Livewire event listener -->
        <script>
            document.addEventListener('livewire:initialized', () => {
                Livewire.on('toggle-dark-mode', () => {
                    // The actual toggling is handled by Alpine.js
                    // This event is just for potential future Livewire interoperability
                });
            });
        </script>
    </div>
</div>
