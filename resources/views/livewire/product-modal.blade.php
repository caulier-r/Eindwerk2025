<div>
    {{-- In work, do what you enjoy. --}}
    @if($isOpen && $product)
        <!-- Modal Overlay -->
        <div class="fixed inset-0 z-50 overflow-y-auto">
            <!-- Background overlay -->
            <div class="fixed inset-0 backdrop-blur-sm" wire:click="closeModal"></div>

            <!-- Modal Container -->
            <div class="flex items-center justify-center min-h-screen p-4">
                <!-- Modal Content -->
                <div class="relative bg-white dark:bg-gray-800 rounded-lg shadow-xl max-w-4xl w-full max-h-[90vh] overflow-y-auto" wire:click.stop>
                    <!-- Close button -->
                    <button wire:click="closeModal" class="absolute top-4 right-4 z-10 bg-gray-100 dark:bg-gray-700 rounded-full p-2 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                    <div class="p-6">
                        <div class="flex flex-col lg:flex-row gap-6">
                            <!-- Product Image -->
                            <div class="lg:w-1/2">
                                @if($product->image)
                                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-64 lg:h-80 object-cover rounded-lg">
                                @else
                                    <div class="w-full h-64 lg:h-80 bg-gradient-to-r from-gray-400 to-gray-600 rounded-lg flex items-center justify-center">
                                        <span class="text-white text-4xl font-semibold">{{ substr($product->name, 0, 2) }}</span>
                                    </div>
                                @endif
                            </div>

                            <!-- Product Details -->
                            <div class="lg:w-1/2">
                                <!-- Category & Featured Badge -->
                                <div class="flex items-center gap-2 mb-4">
                                    <span class="px-3 py-1 bg-indigo-100 dark:bg-indigo-900 text-indigo-800 dark:text-indigo-200 text-sm font-medium rounded">
                                        {{ $product->category }}
                                    </span>
                                    @if($product->featured)
                                        <span class="px-3 py-1 bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200 text-sm font-medium rounded">
                                            Featured
                                        </span>
                                    @endif
                                </div>

                                <!-- Frameworks -->
                                @if($product->category === 'FiveM Plugin' && $product->frameworks && count($product->frameworks) > 0)
                                    <div class="flex flex-wrap gap-2 mb-4">
                                        @foreach($product->frameworks as $framework)
                                            <span class="px-3 py-1 bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 text-sm rounded-full">
                                                {{ $framework }}
                                            </span>
                                        @endforeach
                                    </div>
                                @endif

                                <!-- Product Name -->
                                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">{{ $product->name }}</h3>

                                <!-- Price -->
                                <div class="text-3xl font-bold text-indigo-600 dark:text-indigo-400 mb-4">
                                    €{{ number_format($product->price, 2) }}
                                </div>

                                <!-- Description -->
                                <p class="text-gray-600 dark:text-gray-300 mb-6 leading-relaxed">
                                    {{ $product->description }}
                                </p>

                                <!-- Quantity & Add to Cart -->
                                <div class="flex items-center gap-4 mb-6">
                                    <div class="flex items-center">
                                        <label class="text-sm font-medium text-gray-700 dark:text-gray-300 mr-2">Quantity:</label>
                                        <input wire:model="quantity" type="number" min="1" max="10" value="1" class="w-16 px-3 py-1 border border-gray-300 dark:border-gray-600 rounded-md dark:bg-gray-700 dark:text-white">
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex flex-col sm:flex-row gap-3">
                                    <button wire:click="addToCart" class="flex-1 bg-indigo-600 text-white px-6 py-3 rounded-md hover:bg-indigo-700 transition-colors font-medium">
                                        ADD to cart
                                    </button>
                                    <button wire:click="closeModal" class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-md hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif



</div>
