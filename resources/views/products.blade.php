<x-layouts.app :title="__('Dashboard')">
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <!-- Header -->
                <div class="text-center mb-12">
                    <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">
                        Onze Producten
                    </h1>
                    <p class="text-lg text-gray-600 dark:text-gray-300">
                        Ontdek onze collectie van FiveM plugins, Discord bots en web development services
                    </p>
                </div>

                <!-- Featured Products -->
                @if($featuredProducts->count() > 0)
                    <div class="mb-12">
                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">
                            Featured Products
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                            @foreach($featuredProducts as $product)
                                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow h-110 flex flex-col product-card" data-category="{{ $product->category }}">
                                    <div class="aspect-w-16 aspect-h-9">
                                        @if($product->image)
                                            <div class="w-full h-40 overflow-hidden">
                                                <img src="{{ asset('images/' . $product->image) }}"
                                                     alt="{{ $product->name }}"
                                                     class="w-full h-full object-cover">
                                            </div>
                                        @else
                                            <div class="w-full h-40 bg-gradient-to-r from-gray-400 to-gray-600 flex items-center justify-center">
                                                <span class="text-white text-lg font-semibold">{{ substr($product->name, 0, 2) }}</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="p-6 flex-1 flex flex-col">
                                        <div class="flex items-center justify-between mb-2">
                                            <span class="px-2 py-1 bg-indigo-100 dark:bg-indigo-900 text-indigo-800 dark:text-indigo-200 text-xs font-medium rounded">
                                                {{ $product->category }}
                                            </span>
                                            <span class="px-2 py-1 bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200 text-xs font-medium rounded">
                                                Featured
                                            </span>
                                        </div>

                                        <!-- Frameworks voor FiveM Plugins -->
                                        @if($product->category === 'FiveM Plugin' && $product->frameworks && count($product->frameworks) > 0)
                                            <div class="flex flex-wrap gap-1 mt-2 mb-2">
                                                @foreach($product->frameworks as $framework)
                                                    <span class="px-2 py-1 bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 text-xs rounded-full">
                                                        {{ $framework }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        @endif

                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                                            {{ $product->name }}
                                        </h3>
                                        <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 flex-1 line-clamp-3">
                                            {{ Str::limit($product->description, 100) }}
                                        </p>
                                        <div class="flex items-center justify-between mt-auto">
                                            <span class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">
                                                €{{ number_format($product->price, 2) }}
                                            </span>
                                            <button class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition-colors">
                                                Bekijk Details
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- All Products -->
                <div>
                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">
                        All Products
                    </h2>

                    <!-- Filter/Search (optioneel) -->
                    <div class="mb-6 flex flex-wrap gap-4">
                        <select id="categoryFilter" class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md dark:bg-gray-700 dark:text-white">
                            <option value="">Alle Categorieën</option>
                            <option value="FiveM Plugin">FiveM Plugin</option>
                            <option value="Discord Bot">Discord Bot</option>
                            <option value="Web Development">Web Development</option>
                        </select>
                    </div>

                    <!-- Products Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        @foreach($products as $product)
                            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow h-110 flex flex-col product-card" data-category="{{ $product->category }}">
                                <div class="aspect-w-16 aspect-h-9">
                                    @if($product->image)
                                        <div class="w-full h-40 overflow-hidden">
                                            <img src="{{ asset('images/' . $product->image) }}"
                                                 alt="{{ $product->name }}"
                                                 class="w-full h-full object-cover">
                                        </div>
                                    @else
                                        <div class="w-full h-40 bg-gradient-to-r from-gray-400 to-gray-600 flex items-center justify-center">
                                            <span class="text-white text-lg font-semibold">{{ substr($product->name, 0, 2) }}</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="p-4 flex-1 flex flex-col">
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="px-2 py-1 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 text-xs font-medium rounded">
                                            {{ $product->category }}
                                        </span>
                                        @if($product->featured)
                                            <span class="px-2 py-1 bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200 text-xs font-medium rounded">
                                                Featured
                                            </span>
                                        @endif
                                    </div>

                                    <!-- Frameworks voor FiveM Plugins -->
                                    @if($product->category === 'FiveM Plugin' && $product->frameworks && count($product->frameworks) > 0)
                                        <div class="flex flex-wrap gap-1 mt-2 mb-2">
                                            @foreach($product->frameworks as $framework)
                                                <span class="px-2 py-1 bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 text-xs rounded-full">
                                                    {{ $framework }}
                                                </span>
                                            @endforeach
                                        </div>
                                    @endif

                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                                        {{ $product->name }}
                                    </h3>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-3 flex-1 line-clamp-2">
                                        {{ Str::limit($product->description, 80) }}
                                    </p>
                                    <div class="flex items-center justify-between mt-auto">
                                        <span class="text-xl font-bold text-indigo-600 dark:text-indigo-400">
                                            €{{ number_format($product->price, 2) }}
                                        </span>
                                        <button class="px-3 py-1 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition-colors text-sm">
                                            Details
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-8">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>

<script>
    document.getElementById('categoryFilter').addEventListener('change', function() {
        const selectedCategory = this.value;
        const productCards = document.querySelectorAll('.product-card');

        productCards.forEach(card => {
            const category = card.getAttribute('data-category');

            if (selectedCategory === '' || category === selectedCategory) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    });
</script>
