<x-layouts.marketing title="Contact - RV Design & Development">

    <!-- Hero Section -->
    <section class="relative min-h-screen bg-gradient-to-br from-indigo-600 via-purple-600 to-blue-700 overflow-hidden flex items-center">
        <!-- Animated background -->
        <div class="absolute inset-0">
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-white/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-purple-300/10 rounded-full blur-3xl animate-bounce" style="animation-duration: 3s;"></div>
            <div class="absolute top-1/2 left-1/3 w-64 h-64 bg-indigo-300/10 rounded-full blur-2xl animate-ping" style="animation-duration: 4s;"></div>
        </div>

        <!-- Floating elements -->
        <div class="absolute top-20 left-10 opacity-20">
            <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 border border-white/20 rotate-12">
                <div class="text-white text-sm font-mono">rvdesignanddevelopment@gmail.com</div>
            </div>
        </div>

        <div class="absolute bottom-32 right-12 opacity-20">
            <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3 border border-white/20 -rotate-6">
                <div class="text-white text-sm">📧 ✨</div>
            </div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-6xl lg:text-8xl font-black mb-8">
                    <span class="bg-gradient-to-r from-white via-purple-100 to-indigo-100 bg-clip-text text-transparent drop-shadow-2xl">
                        Get In Touch
                    </span>
                </h1>
                <p class="text-xl lg:text-2xl text-purple-100 font-light leading-relaxed max-w-3xl mx-auto mb-12">
                    Ready to start your next project? Robin & Vincent are here to turn your ideas into digital reality.
                </p>

                <!-- Quick contact options -->
                <div class="flex flex-col sm:flex-row gap-6 justify-center items-center mb-16">
                    <a href="mailto:rvdesignanddevelopment@gmail.com" class="group flex items-center space-x-3 bg-white/10 backdrop-blur-sm px-6 py-3 rounded-2xl border border-white/20 hover:bg-white/20 transition-all duration-300 hover:scale-105">
                        <svg class="w-5 h-5 text-purple-200 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                        </svg>
                        <span class="text-purple-200 group-hover:text-white font-medium">rvdesignanddevelopment@gmail.com</span>
                    </a>

                    <div class="hidden sm:block w-px h-8 bg-purple-300/30"></div>

                    <div class="flex items-center space-x-2">
                        <div class="w-3 h-3 bg-green-400 rounded-full animate-pulse"></div>
                        <span class="text-purple-200">Usually respond within 24 hours</span>
                    </div>
                </div>

                <!-- Scroll indicator -->
                <div class="animate-bounce">
                    <div class="w-6 h-10 border-2 border-white/30 rounded-full flex justify-center mx-auto">
                        <div class="w-1 h-3 bg-white/60 rounded-full mt-2 animate-pulse"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form & Info -->
    <section class="py-20 bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16">
                <!-- Contact Form -->
                <div>
                    <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl p-8 border border-gray-700">
                        <h2 class="text-3xl font-bold text-white mb-8">Send us a message</h2>

                        <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                            @csrf

                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Name</label>
                                    <input type="text" id="name" name="name" required
                                           class="w-full px-4 py-3 bg-gray-800 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all duration-300"
                                           placeholder="Your name">
                                </div>

                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email</label>
                                    <input type="email" id="email" name="email" required
                                           class="w-full px-4 py-3 bg-gray-800 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all duration-300"
                                           placeholder="your@email.com">
                                </div>
                            </div>

                            <div>
                                <label for="project_type" class="block text-sm font-medium text-gray-300 mb-2">Project Type</label>
                                <select id="project_type" name="project_type" required
                                        class="w-full px-4 py-3 bg-gray-800 border border-gray-600 rounded-xl text-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all duration-300">
                                    <option value="">Select project type</option>
                                    <option value="laravel_website">Laravel Website</option>
                                    <option value="discord_bot">Discord Bot</option>
                                    <option value="fivem_plugin">FiveM Plugin</option>
                                    <option value="custom_development">Custom Development</option>
                                    <option value="consultation">Consultation</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <div>
                                <label for="budget" class="block text-sm font-medium text-gray-300 mb-2">Estimated Budget</label>
                                <select id="budget" name="budget"
                                        class="w-full px-4 py-3 bg-gray-800 border border-gray-600 rounded-xl text-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all duration-300">
                                    <option value="">Select budget range</option>
                                    <option value="under_1k">Under €1,000</option>
                                    <option value="1k_5k">€1,000 - €5,000</option>
                                    <option value="5k_10k">€5,000 - €10,000</option>
                                    <option value="10k_plus">€10,000+</option>
                                    <option value="not_sure">Not sure yet</option>
                                </select>
                            </div>

                            <div>
                                <label for="timeline" class="block text-sm font-medium text-gray-300 mb-2">Timeline</label>
                                <select id="timeline" name="timeline"
                                        class="w-full px-4 py-3 bg-gray-800 border border-gray-600 rounded-xl text-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all duration-300">
                                    <option value="">Select timeline</option>
                                    <option value="asap">ASAP</option>
                                    <option value="1_month">Within 1 month</option>
                                    <option value="2_3_months">2-3 months</option>
                                    <option value="flexible">Flexible</option>
                                </select>
                            </div>

                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-300 mb-2">Project Details</label>
                                <textarea id="message" name="message" rows="6" required
                                          class="w-full px-4 py-3 bg-gray-800 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all duration-300 resize-none"
                                          placeholder="Tell us about your project... What are you looking to build? Any specific requirements or features?"></textarea>
                            </div>

                            <div class="flex items-start space-x-3">
                                <input type="checkbox" id="newsletter" name="newsletter"
                                       class="mt-1 w-5 h-5 bg-gray-800 border border-gray-600 rounded focus:ring-indigo-500 focus:ring-2 text-indigo-600">
                                <label for="newsletter" class="text-sm text-gray-300">
                                    I'd like to receive updates about new services and development tips from RV Design & Development
                                </label>
                            </div>

                            <button type="submit"
                                    class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-4 px-6 rounded-xl font-semibold hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 hover:scale-105 hover:shadow-xl">
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="space-y-8">
                    <!-- Contact Info Cards -->
                    <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl p-8 border border-gray-700">
                        <h3 class="text-2xl font-bold text-white mb-6">Get in touch</h3>

                        <div class="space-y-6">
                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 bg-indigo-600 rounded-2xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-white font-semibold text-lg mb-1">Email</h4>
                                    <p class="text-gray-300">rvdesignanddevelopment@gmail.com</p>
                                    <p class="text-gray-400 text-sm">We usually respond within 24 hours</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 bg-purple-600 rounded-2xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-white font-semibold text-lg mb-1">Location</h4>
                                    <p class="text-gray-300">Belgium 🇧🇪</p>
                                    <p class="text-gray-400 text-sm">Available for remote work worldwide</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 bg-green-600 rounded-2xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-white font-semibold text-lg mb-1">Response Time</h4>
                                    <p class="text-gray-300">Within 24 hours</p>
                                    <p class="text-gray-400 text-sm">Faster responses during business hours (CET)</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Social Links -->
                    <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl p-8 border border-gray-700">
                        <h3 class="text-2xl font-bold text-white mb-6">Follow our work</h3>

                        <div class="space-y-4">
                            <a href="#" class="group flex items-center space-x-4 p-4 bg-gray-800/50 rounded-2xl border border-gray-600 hover:border-indigo-500/50 transition-all duration-300 hover:bg-gray-700/50">
                                <div class="w-10 h-10 bg-gray-700 rounded-xl flex items-center justify-center group-hover:bg-gray-600 transition-colors">
                                    <svg class="w-5 h-5 text-gray-300 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-white font-medium">GitHub</h4>
                                    <p class="text-gray-400 text-sm">Check out our open source projects</p>
                                </div>
                            </a>

                            <a href="#" class="group flex items-center space-x-4 p-4 bg-gray-800/50 rounded-2xl border border-gray-600 hover:border-blue-500/50 transition-all duration-300 hover:bg-gray-700/50">
                                <div class="w-10 h-10 bg-gray-700 rounded-xl flex items-center justify-center group-hover:bg-gray-600 transition-colors">
                                    <svg class="w-5 h-5 text-gray-300 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-white font-medium">LinkedIn</h4>
                                    <p class="text-gray-400 text-sm">Connect with us professionally</p>
                                </div>
                            </a>

                            <a href="#" class="group flex items-center space-x-4 p-4 bg-gray-800/50 rounded-2xl border border-gray-600 hover:border-purple-500/50 transition-all duration-300 hover:bg-gray-700/50">
                                <div class="w-10 h-10 bg-gray-700 rounded-xl flex items-center justify-center group-hover:bg-gray-600 transition-colors">
                                    <svg class="w-5 h-5 text-gray-300 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0 12.64 12.64 0 0 0-.617-1.25.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 0 0 .031.057 19.9 19.9 0 0 0 5.993 3.03.078.078 0 0 0 .084-.028 14.09 14.09 0 0 0 1.226-1.994.076.076 0 0 0-.041-.106 13.107 13.107 0 0 1-1.872-.892.077.077 0 0 1-.008-.128 10.2 10.2 0 0 0 .372-.292.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127 12.299 12.299 0 0 1-1.873.892.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028 19.839 19.839 0 0 0 6.002-3.03.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.956-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.956 2.418-2.157 2.418zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.955-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.946 2.418-2.157 2.418z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-white font-medium">Discord</h4>
                                    <p class="text-gray-400 text-sm">Join our development community</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- FAQ Quick Links -->
                    <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl p-8 border border-gray-700">
                        <h3 class="text-2xl font-bold text-white mb-6">Quick answers</h3>

                        <div class="space-y-4">
                            <div class="p-4 bg-gray-800/50 rounded-2xl border border-gray-600">
                                <h4 class="text-white font-medium mb-2">💰 How much do projects typically cost?</h4>
                                <p class="text-gray-300 text-sm">Project costs vary based on complexity. Simple Discord bots start at €500, Laravel websites from €2,000, and FiveM plugins from €1,000.</p>
                            </div>

                            <div class="p-4 bg-gray-800/50 rounded-2xl border border-gray-600">
                                <h4 class="text-white font-medium mb-2">⏱️ How long do projects take?</h4>
                                <p class="text-gray-300 text-sm">Timeline depends on scope. Discord bots: 1-2 weeks, Laravel websites: 4-8 weeks, FiveM plugins: 2-4 weeks.</p>
                            </div>

                            <div class="p-4 bg-gray-800/50 rounded-2xl border border-gray-600">
                                <h4 class="text-white font-medium mb-2">🔧 Do you provide ongoing support?</h4>
                                <p class="text-gray-300 text-sm">Yes! We offer maintenance packages and are always available for updates, bug fixes, and feature additions.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Overview -->
    <section class="py-20 bg-gradient-to-br from-gray-900 via-indigo-900/20 to-purple-900/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-bold text-white mb-4">Our Process</h2>
                <p class="text-xl text-gray-300">How we bring your project to life</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center group">
                    <div class="relative mb-6">
                        <div class="w-20 h-20 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-2xl mx-auto flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <span class="text-white text-2xl font-bold">1</span>
                        </div>
                        <div class="absolute -bottom-2 -right-2 w-6 h-6 bg-indigo-400 rounded-full animate-ping"></div>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Discovery</h3>
                    <p class="text-gray-300">We discuss your project, understand your needs, and define the scope together.</p>
                </div>

                <div class="text-center group">
                    <div class="relative mb-6">
                        <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl mx-auto flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <span class="text-white text-2xl font-bold">2</span>
                        </div>
                        <div class="absolute -bottom-2 -right-2 w-6 h-6 bg-purple-400 rounded-full animate-ping" style="animation-delay: 0.5s;"></div>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Planning</h3>
                    <p class="text-gray-300">We create a detailed project plan, timeline, and provide you with a transparent quote.</p>
                </div>

                <div class="text-center group">
                    <div class="relative mb-6">
                        <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-blue-500 rounded-2xl mx-auto flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <span class="text-white text-2xl font-bold">3</span>
                        </div>
                        <div class="absolute -bottom-2 -right-2 w-6 h-6 bg-green-400 rounded-full animate-ping" style="animation-delay: 1s;"></div>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Development</h3>
                    <p class="text-gray-300">Robin & Vincent get to work, keeping you updated with regular progress reports.</p>
                </div>

                <div class="text-center group">
                    <div class="relative mb-6">
                        <div class="w-20 h-20 bg-gradient-to-br from-orange-500 to-red-500 rounded-2xl mx-auto flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <span class="text-white text-2xl font-bold">4</span>
                        </div>
                        <div class="absolute -bottom-2 -right-2 w-6 h-6 bg-orange-400 rounded-full animate-ping" style="animation-delay: 1.5s;"></div>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Launch</h3>
                    <p class="text-gray-300">We deploy your project, provide training, and ensure everything runs perfectly.</p>
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
                Ready to Start Building?
            </h2>
            <p class="text-xl text-purple-100 mb-8 leading-relaxed">
                Don't let your ideas stay ideas. Let's turn them into something amazing together.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="mailto:rvdesignanddevelopment@gmail.com" class="bg-white text-indigo-600 px-8 py-4 rounded-2xl font-semibold hover:bg-gray-100 transition-all duration-300 hover:scale-105 shadow-xl">
                    Send us an Email
                </a>
                <a href="{{ route('portfolio') }}" class="bg-white/10 backdrop-blur-sm text-white px-8 py-4 rounded-2xl font-semibold border border-white/20 hover:bg-white/20 transition-all duration-300 hover:scale-105">
                    View Our Portfolio
                </a>
            </div>
        </div>
    </section>

</x-layouts.marketing>
