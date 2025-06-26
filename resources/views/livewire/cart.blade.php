<div class="container mx-auto px-4 py-8 mt-16">
    <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-8">Shopping Cart</h1>

    @if($cartItems->count() > 0)
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
            @foreach($cartItems as $item)
                <div class="p-6 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        @if($item->product->image)
                            <img src="{{ asset('images/' . $item->product->image) }}"
                                 alt="{{ $item->product->name }}"
                                 class="w-16 h-16 object-cover rounded">
                        @else
                            <div class="w-16 h-16 bg-gray-300 rounded flex items-center justify-center">
                                <span class="text-gray-600 font-bold">{{ substr($item->product->name, 0, 2) }}</span>
                            </div>
                        @endif

                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $item->product->name }}</h3>
                            <p class="text-gray-600 dark:text-gray-300">{{ $item->product->category }}</p>
                            <div class="flex items-center space-x-2 mt-2">
                                <label class="text-sm text-gray-500">Quantity:</label>
                                <input type="number"
                                       value="{{ $item->quantity }}"
                                       min="1"
                                       max="99"
                                       step="1"
                                       class="w-16 px-2 py-1 border border-gray-300 dark:border-gray-600 rounded text-center bg-white dark:bg-gray-700 text-gray-900 dark:text-white text-sm"
                                       wire:change="updateQuantity({{ $item->id }}, $event.target.value)"
                                       onkeypress="if(event.key==='-'||event.key==='+'||event.key==='e'||event.key==='E') event.preventDefault();">
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <span class="text-xl font-bold text-indigo-600 dark:text-indigo-400">
                            €{{ number_format($item->total_price, 2) }}
                        </span>

                        <button wire:click="removeFromCart({{ $item->product->id }})"
                                class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            @endforeach

            <!-- Cart Total -->
            <div class="p-6 bg-gray-50 dark:bg-gray-700">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-xl font-semibold text-gray-900 dark:text-white">Total:</span>
                    <span class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">€{{ number_format($cartTotal, 2) }}</span>
                </div>

                <a href="{{ route('checkout') }}" class="block w-full bg-indigo-600 text-white py-3 px-4 rounded-md hover:bg-indigo-700 transition-colors font-medium text-center">
                    Proceed to Checkout
                </a>
            </div>
        </div>
    @else
        <div class="text-center py-12">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.5 6M7 13l-1.5 6m0 0h9M17 13v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6"></path>
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">Your cart is empty</h3>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Start shopping to add items to your cart.</p>
            <div class="mt-6">
                <a href="{{ route('products') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                    Continue Shopping
                </a>
            </div>
        </div>
    @endif
</div>
