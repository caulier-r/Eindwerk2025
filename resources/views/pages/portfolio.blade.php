<x-layouts.marketing title="Portfolio - RV Design & Development">

    <!-- Hero Section -->
    <section class="relative min-h-screen bg-gradient-to-br from-indigo-600 via-purple-600 to-blue-700 overflow-hidden">
        <!-- Animated background -->
        <div class="absolute inset-0">
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-white/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-purple-300/10 rounded-full blur-3xl animate-bounce" style="animation-duration: 3s;"></div>
            <div class="absolute top-1/2 left-1/3 w-64 h-64 bg-indigo-300/10 rounded-full blur-2xl animate-ping" style="animation-duration: 4s;"></div>
        </div>

        <!-- Floating code elements -->
        <div class="absolute top-20 left-10 opacity-20">
            <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 border border-white/20 rotate-12">
                <div class="space-y-2">
                    <div class="h-2 bg-green-400 rounded w-16"></div>
                    <div class="h-2 bg-blue-400 rounded w-24"></div>
                    <div class="h-2 bg-orange-400 rounded w-12"></div>
                </div>
            </div>
        </div>

        <div class="absolute bottom-32 right-12 opacity-20">
            <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3 border border-white/20 -rotate-6">
                <div class="text-white text-sm font-mono">&lt;Laravel /&gt;</div>
            </div>
        </div>

        <div class="relative z-10 flex items-center justify-center min-h-screen px-4">
            <div class="text-center max-w-4xl mx-auto">
                <div class="mb-8">
                    <h1 class="text-6xl lg:text-8xl font-black mb-6">
                        <span class="bg-gradient-to-r from-white via-purple-100 to-indigo-100 bg-clip-text text-transparent drop-shadow-2xl">
                            Our Work
                        </span>
                    </h1>
                    <p class="text-xl lg:text-2xl text-purple-100 font-light leading-relaxed max-w-3xl mx-auto">
                        Crafting digital experiences that push boundaries. From dynamic Laravel applications to intelligent Discord bots and immersive FiveM plugins.
                    </p>
                </div>

                <div class="flex justify-center space-x-8 text-purple-200">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-white">50+</div>
                        <div class="text-sm">Projects Delivered</div>
                    </div>
                    <div class="w-px bg-purple-300/30"></div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-white">2</div>
                        <div class="text-sm">Years Experience</div>
                    </div>
                    <div class="w-px bg-purple-300/30"></div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-white">24/7</div>
                        <div class="text-sm">Support</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <div class="w-6 h-10 border-2 border-white/30 rounded-full flex justify-center">
                <div class="w-1 h-3 bg-white/60 rounded-full mt-2 animate-pulse"></div>
            </div>
        </div>
    </section>

    <!-- Project Categories -->
    <section class="py-20 bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-bold text-white mb-4">
                    What We Build
                </h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                    Robin & Vincent specialize in three core areas of development
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Laravel Websites -->
                <div class="group relative bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl p-8 border border-gray-700 hover:border-indigo-500/50 transition-all duration-500 hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-br from-indigo-600/10 to-purple-600/10 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-indigo-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2L2 7v10c0 5.55 3.84 9.74 9 11 5.16-1.26 9-5.45 9-11V7l-10-5z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4">Laravel Websites</h3>
                        <p class="text-gray-300 mb-6">Modern, scalable web applications built with Laravel. From e-commerce platforms to custom business solutions.</p>
                        <ul class="space-y-2 text-gray-400">
                            <li class="flex items-center">
                                <span class="w-1.5 h-1.5 bg-indigo-400 rounded-full mr-3"></span>
                                Custom CMS Development
                            </li>
                            <li class="flex items-center">
                                <span class="w-1.5 h-1.5 bg-indigo-400 rounded-full mr-3"></span>
                                E-commerce Solutions
                            </li>
                            <li class="flex items-center">
                                <span class="w-1.5 h-1.5 bg-indigo-400 rounded-full mr-3"></span>
                                API Development
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Discord Bots -->
                <div class="group relative bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl p-8 border border-gray-700 hover:border-purple-500/50 transition-all duration-500 hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-600/10 to-pink-600/10 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-purple-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0 12.64 12.64 0 0 0-.617-1.25.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 0 0 .031.057 19.9 19.9 0 0 0 5.993 3.03.078.078 0 0 0 .084-.028 14.09 14.09 0 0 0 1.226-1.994.076.076 0 0 0-.041-.106 13.107 13.107 0 0 1-1.872-.892.077.077 0 0 1-.008-.128 10.2 10.2 0 0 0 .372-.292.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127 12.299 12.299 0 0 1-1.873.892.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028 19.839 19.839 0 0 0 6.002-3.03.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.956-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.956 2.418-2.157 2.418zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.955-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.946 2.418-2.157 2.418z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4">Discord Bots</h3>
                        <p class="text-gray-300 mb-6">Intelligent Discord bots that automate tasks, moderate communities, and enhance user experiences.</p>
                        <ul class="space-y-2 text-gray-400">
                            <li class="flex items-center">
                                <span class="w-1.5 h-1.5 bg-purple-400 rounded-full mr-3"></span>
                                Moderation & Anti-Spam
                            </li>
                            <li class="flex items-center">
                                <span class="w-1.5 h-1.5 bg-purple-400 rounded-full mr-3"></span>
                                Custom Commands
                            </li>
                            <li class="flex items-center">
                                <span class="w-1.5 h-1.5 bg-purple-400 rounded-full mr-3"></span>
                                Database Integration
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- FiveM Plugins -->
                <div class="group relative bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl p-8 border border-gray-700 hover:border-green-500/50 transition-all duration-500 hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-br from-green-600/10 to-blue-600/10 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-green-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4">FiveM Plugins</h3>
                        <p class="text-gray-300 mb-6">Custom FiveM scripts and plugins that create unique gameplay experiences for roleplay servers.</p>
                        <ul class="space-y-2 text-gray-400">
                            <li class="flex items-center">
                                <span class="w-1.5 h-1.5 bg-green-400 rounded-full mr-3"></span>
                                Roleplay Systems
                            </li>
                            <li class="flex items-center">
                                <span class="w-1.5 h-1.5 bg-green-400 rounded-full mr-3"></span>
                                Economy Scripts
                            </li>
                            <li class="flex items-center">
                                <span class="w-1.5 h-1.5 bg-green-400 rounded-full mr-3"></span>
                                Custom Jobs & Activities
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Projects -->
    <section class="py-20 bg-gradient-to-br from-gray-900 via-indigo-900/20 to-purple-900/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-bold text-white mb-4">
                    Featured Projects
                </h2>
                <p class="text-xl text-gray-300">
                    Some of our best work that we're proud to showcase
                </p>
            </div>

            <div class="space-y-16">
                <!-- Project 1 -->
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div class="order-2 lg:order-1">
                        <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-gray-700">
                            <div class="flex items-center space-x-4 mb-6">
                                <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                                <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                                <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                            </div>
                            <div class="space-y-3">
                                <div class="h-4 bg-gradient-to-r from-indigo-500 to-purple-500 rounded w-3/4"></div>
                                <div class="h-3 bg-gray-600 rounded w-1/2"></div>
                                <div class="h-3 bg-gray-600 rounded w-2/3"></div>
                                <div class="space-y-2 mt-6">
                                    <div class="h-2 bg-green-400 rounded w-1/4"></div>
                                    <div class="h-2 bg-blue-400 rounded w-1/3"></div>
                                    <div class="h-2 bg-orange-400 rounded w-1/5"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="order-1 lg:order-2">
                        <div class="space-y-6">
                            <div class="inline-flex items-center px-4 py-2 bg-indigo-600/20 border border-indigo-500/30 rounded-full">
                                <span class="text-indigo-300 text-sm font-medium">Laravel Application</span>
                            </div>
                            <h3 class="text-3xl lg:text-4xl font-bold text-white">
                                E-Commerce Platform
                            </h3>
                            <p class="text-xl text-gray-300 leading-relaxed">
                                A fully-featured e-commerce platform built with Laravel 12, featuring advanced inventory management, multi-payment gateway integration, and real-time analytics dashboard.
                            </p>
                            <div class="flex flex-wrap gap-3">
                                <span class="px-3 py-1 bg-gray-800 border border-gray-600 rounded-full text-sm text-gray-300">Laravel 12</span>
                                <span class="px-3 py-1 bg-gray-800 border border-gray-600 rounded-full text-sm text-gray-300">Tailwind CSS</span>
                                <span class="px-3 py-1 bg-gray-800 border border-gray-600 rounded-full text-sm text-gray-300">MySQL</span>
                                <span class="px-3 py-1 bg-gray-800 border border-gray-600 rounded-full text-sm text-gray-300">Redis</span>
                            </div>
                            <a href="#" class="inline-flex items-center text-indigo-400 hover:text-indigo-300 transition-colors group">
                                View Case Study
                                <svg class="ml-2 w-4 h-4 group-hover:translate-x-1 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Project 2 -->
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div class="space-y-6">
                        <div class="inline-flex items-center px-4 py-2 bg-purple-600/20 border border-purple-500/30 rounded-full">
                            <span class="text-purple-300 text-sm font-medium">Discord Bot</span>
                        </div>
                        <h3 class="text-3xl lg:text-4xl font-bold text-white">
                            Community Manager Bot
                        </h3>
                        <p class="text-xl text-gray-300 leading-relaxed">
                            An advanced Discord bot that manages communities of 10,000+ members with AI-powered moderation, custom leveling system, and seamless integration with external APIs.
                        </p>
                        <div class="flex flex-wrap gap-3">
                            <span class="px-3 py-1 bg-gray-800 border border-gray-600 rounded-full text-sm text-gray-300">Discord.js</span>
                            <span class="px-3 py-1 bg-gray-800 border border-gray-600 rounded-full text-sm text-gray-300">Node.js</span>
                            <span class="px-3 py-1 bg-gray-800 border border-gray-600 rounded-full text-sm text-gray-300">MongoDB</span>
                            <span class="px-3 py-1 bg-gray-800 border border-gray-600 rounded-full text-sm text-gray-300">AI Integration</span>
                        </div>
                        <a href="#" class="inline-flex items-center text-purple-400 hover:text-purple-300 transition-colors group">
                            View Case Study
                            <svg class="ml-2 w-4 h-4 group-hover:translate-x-1 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </a>
                    </div>
                    <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-gray-700">
                        <div class="space-y-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-purple-600 rounded-full flex items-center justify-center">
                                    <span class="text-white text-xs font-bold">RV</span>
                                </div>
                                <div>
                                    <div class="h-3 bg-purple-400 rounded w-20"></div>
                                    <div class="h-2 bg-gray-600 rounded w-16 mt-1"></div>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <div class="h-3 bg-gray-600 rounded w-full"></div>
                                <div class="h-3 bg-gray-600 rounded w-3/4"></div>
                            </div>
                            <div class="flex space-x-2 mt-4">
                                <div class="px-3 py-1 bg-green-600/20 border border-green-500/30 rounded text-xs text-green-300">Online: 1,247</div>
                                <div class="px-3 py-1 bg-blue-600/20 border border-blue-500/30 rounded text-xs text-blue-300">Messages: 45k</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project 3 -->
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div class="order-2 lg:order-1">
                        <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-gray-700">
                            <div class="space-y-6">
                                <div class="flex items-center justify-between">
                                    <h4 class="text-green-400 font-semibold">FiveM Server: Los Santos RP</h4>
                                    <span class="px-2 py-1 bg-green-600/20 border border-green-500/30 rounded text-xs text-green-300">128/128</span>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="space-y-2">
                                        <div class="h-3 bg-blue-400 rounded w-full"></div>
                                        <div class="text-xs text-gray-400">Police Department</div>
                                    </div>
                                    <div class="space-y-2">
                                        <div class="h-3 bg-red-400 rounded w-3/4"></div>
                                        <div class="text-xs text-gray-400">Emergency Services</div>
                                    </div>
                                    <div class="space-y-2">
                                        <div class="h-3 bg-yellow-400 rounded w-2/3"></div>
                                        <div class="text-xs text-gray-400">Taxi Services</div>
                                    </div>
                                    <div class="space-y-2">
                                        <div class="h-3 bg-purple-400 rounded w-1/2"></div>
                                        <div class="text-xs text-gray-400">Criminal Activities</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="order-1 lg:order-2">
                        <div class="space-y-6">
                            <div class="inline-flex items-center px-4 py-2 bg-green-600/20 border border-green-500/30 rounded-full">
                                <span class="text-green-300 text-sm font-medium">FiveM Plugin</span>
                            </div>
                            <h3 class="text-3xl lg:text-4xl font-bold text-white">
                                Complete RP Framework
                            </h3>
                            <p class="text-xl text-gray-300 leading-relaxed">
                                A comprehensive roleplay framework for FiveM featuring dynamic job systems, realistic economy, property management, and integrated criminal justice system.
                            </p>
                            <div class="flex flex-wrap gap-3">
                                <span class="px-3 py-1 bg-gray-800 border border-gray-600 rounded-full text-sm text-gray-300">Lua</span>
                                <span class="px-3 py-1 bg-gray-800 border border-gray-600 rounded-full text-sm text-gray-300">JavaScript</span>
                                <span class="px-3 py-1 bg-gray-800 border border-gray-600 rounded-full text-sm text-gray-300">MySQL</span>
                                <span class="px-3 py-1 bg-gray-800 border border-gray-600 rounded-full text-sm text-gray-300">ESX Framework</span>
                            </div>
                            <a href="#" class="inline-flex items-center text-green-400 hover:text-green-300 transition-colors group">
                                View Case Study
                                <svg class="ml-2 w-4 h-4 group-hover:translate-x-1 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-20 bg-gradient-to-br from-indigo-600 via-purple-600 to-blue-700 relative overflow-hidden">
        <div class="absolute inset-0">
            <div class="absolute top-1/3 left-1/4 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-1/3 right-1/4 w-80 h-80 bg-purple-300/10 rounded-full blur-3xl"></div>
        </div>

        <div class="relative z-10 max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl lg:text-5xl font-bold text-white mb-6">
                Ready to Start Your Project?
            </h2>
            <p class="text-xl text-purple-100 mb-8 leading-relaxed">
                Let's discuss how Robin & Vincent can bring your digital vision to life with cutting-edge technology and innovative solutions.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact') }}" class="bg-white text-indigo-600 px-8 py-4 rounded-2xl font-semibold hover:bg-gray-100 transition-all duration-300 hover:scale-105 shadow-xl">
                    Get Started Today
                </a>
                <a href="{{ route('about') }}" class="bg-white/10 backdrop-blur-sm text-white px-8 py-4 rounded-2xl font-semibold border border-white/20 hover:bg-white/20 transition-all duration-300 hover:scale-105">
                    Learn More About Us
                </a>
            </div>
        </div>
    </section>

</x-layouts.marketing>
