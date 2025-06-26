<div class="container mx-auto px-4 py-8 mt-16">
    <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-8">Checkout</h1>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Left Column: Shipping Information -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-6">Shipping Information</h2>

            <form wire:submit.prevent="processPayment" class="space-y-4">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Full Name *
                    </label>
                    <input type="text"
                           id="name"
                           wire:model="name"
                           class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white"
                           required>
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Email Address *
                    </label>
                    <input type="email"
                           id="email"
                           wire:model="email"
                           class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white"
                           required>
                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Address -->
                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Street Address *
                    </label>
                    <input type="text"
                           id="address"
                           wire:model="address"
                           class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white"
                           required>
                    @error('address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- City and Postal Code -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="city" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            City *
                        </label>
                        <input type="text"
                               id="city"
                               wire:model="city"
                               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white"
                               required>
                        @error('city') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="postal_code" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Postal Code *
                        </label>
                        <input type="text"
                               id="postal_code"
                               wire:model="postal_code"
                               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white"
                               required>
                        @error('postal_code') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Country -->
                <div>
                    <label for="country" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Country *
                    </label>
                    <select id="country"
                            wire:model="country"
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white"
                            required>
                        <option value="BE">Belgium</option>
                        <option value="NL">Netherlands</option>
                        <option value="DE">Germany</option>
                        <option value="FR">France</option>
                    </select>
                    @error('country') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </form>
        </div>

        <!-- Right Column: Order Summary -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-6">Order Summary</h2>

            <!-- Cart Items -->
            <div class="space-y-4 mb-6">
                @foreach($cartItems as $item)
                    <div class="flex items-center justify-between py-2 border-b border-gray-200 dark:border-gray-600">
                        <div class="flex items-center space-x-3">
                            @if($item->product->image)
                                <img src="{{ asset('images/' . $item->product->image) }}"
                                     alt="{{ $item->product->name }}"
                                     class="w-12 h-12 object-cover rounded">
                            @else
                                <div class="w-12 h-12 bg-gray-300 rounded flex items-center justify-center">
                                    <span class="text-gray-600 text-xs font-bold">{{ substr($item->product->name, 0, 2) }}</span>
                                </div>
                            @endif

                            <div>
                                <h4 class="text-sm font-medium text-gray-900 dark:text-white">{{ $item->product->name }}</h4>
                                <p class="text-xs text-gray-500">Qty: {{ $item->quantity }}</p>
                            </div>
                        </div>

                        <span class="text-sm font-medium text-gray-900 dark:text-white">
                            €{{ number_format($item->total_price, 2) }}
                        </span>
                    </div>
                @endforeach
            </div>

            <!-- Order Total -->
            <div class="border-t border-gray-200 dark:border-gray-600 pt-4 mb-6">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-sm text-gray-600 dark:text-gray-400">Subtotal</span>
                    <span class="text-sm text-gray-900 dark:text-white">€{{ number_format($cartTotal, 2) }}</span>
                </div>
                <div class="flex justify-between items-center mb-2">
                    <span class="text-sm text-gray-600 dark:text-gray-400">Shipping</span>
                    <span class="text-sm text-gray-900 dark:text-white">Free</span>
                </div>
                <div class="flex justify-between items-center text-lg font-semibold">
                    <span class="text-gray-900 dark:text-white">Total</span>
                    <span class="text-indigo-600 dark:text-indigo-400">€{{ number_format($cartTotal, 2) }}</span>
                </div>
            </div>

            <!-- Payment Button -->
            <button type="submit"
                    wire:click="processPayment"
                    wire:loading.attr="disabled"
                    class="w-full bg-indigo-600 text-white py-3 px-4 rounded-md hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-200 transition-colors font-medium disabled:opacity-50 disabled:cursor-not-allowed">
                <span wire:loading.remove>Complete Payment</span>
                <span wire:loading>Processing...</span>
            </button>

            <!-- Secure Payment Info -->
            <div class="mt-4 text-center">
                <p class="text-xs text-gray-500 dark:text-gray-400 flex items-center justify-center">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                    </svg>
                    Secure payment powered by Stripe
                </p>
            </div>
        </div>
    </div>

    <!-- Error Messages -->
    @if (session()->has('error'))
        <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            {{ session('error') }}
        </div>
    @endif
</div>
