<div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow min-h-[550px] flex flex-col product-card"
     data-category="{{ $product->category }}">

    <!-- Image Section -->
    @if($product->image)
        <div class="w-full h-48 overflow-hidden">
            <img src="{{ asset('images/' . $product->image) }}"
                 alt="{{ $product->name }}"
                 class="w-full h-full object-cover object-center">
        </div>

    @else
        <div class="w-full h-48 bg-gradient-to-r from-gray-400 to-gray-600 flex items-center justify-center">
            <span class="text-white text-lg font-semibold">{{ substr($product->name, 0, 2) }}</span>
        </div>
    @endif

    <!-- Content Section -->
    <div class="p-6 flex-1 flex flex-col">
        <!-- Badges -->
        <div class="flex items-center justify-between mb-2">
            <span class="px-2 py-1 bg-indigo-100 dark:bg-indigo-900 text-indigo-800 dark:text-indigo-200 text-xs font-medium rounded">
                {{ $product->category }}
            </span>
            @if($showFeaturedBadge && $product->featured)
                <span class="px-2 py-1 bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200 text-xs font-medium rounded">
                    Featured
                </span>
            @endif
        </div>

        <!-- Frameworks for FiveM Plugins -->
        @if($product->category === 'FiveM Plugin' && $product->frameworks && count($product->frameworks) > 0)
            <div class="flex flex-wrap gap-1 mt-2 mb-2">
                @foreach($product->frameworks as $framework)
                    <span class="px-2 py-1 bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 text-xs rounded-full">
                        {{ $framework }}
                    </span>
                @endforeach
            </div>
        @endif

        <!-- Product Info -->
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
            {{ $product->name }}
        </h3>

        <!-- Description with Read More -->
        <div class="text-gray-600 dark:text-gray-300 text-sm mb-4 flex-1">
            @if($this->needsReadMore())
                <p class="mb-2">{{ Str::limit($product->description, 120) }}</p>
                @auth
                    <button wire:click="openModal" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 text-sm font-medium underline">
                        Read More
                    </button>
                @else
                    <a href="{{ route('login') }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 text-sm font-medium underline">
                        Login to see more
                    </a>
                @endif
            @else
                <p>{{ $product->description }}</p>
            @endif
        </div>

        <!-- Price and Button -->
        <div class="flex items-center justify-between mt-auto">
            <span class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">
                €{{ number_format($product->price, 2) }}
            </span>

            @auth
                <button wire:click="openModal" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition-colors">
                    Details
                </button>
            @else
                <a href="{{ route('login') }}" class="px-3 py-2 text-sm font-medium rounded-md bg-white dark:bg-indigo-600 text-indigo-700 dark:text-white hover:bg-indigo-50 dark:hover:bg-indigo-700 transition-colors duration-200 shadow-sm">
                    Login to see more
                </a>
            @endif

        </div>
    </div>
</div>
