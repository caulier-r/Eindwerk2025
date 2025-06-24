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
                                <livewire:product-card
                                    :product="$product"
                                    :showFeaturedBadge="true"
                                    :key="'featured-'.$product->id" />
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- All Products -->
                <div>
                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">
                        All Products
                    </h2>

                    <!-- Filter/Search -->
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
                            <livewire:product-card
                                :product="$product"
                                :showFeaturedBadge="false"
                                size="small"
                                :key="'product-'.$product->id" />
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
    <!-- Product Modal -->
    <livewire:product-modal />
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
