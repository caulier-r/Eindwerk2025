<div>
    {{-- Success is as dangerous as failure. --}}
    <a href="{{ route('cart') }}" class="px-3 py-2 text-sm font-medium rounded-md bg-white dark:bg-indigo-600 text-indigo-700 dark:text-white hover:bg-indigo-50 dark:hover:bg-indigo-700 transition-colors duration-200 shadow-sm flex items-center">
        <!-- Cart Icon -->
        <svg class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.5 6M7 13l-1.5 6m0 0h9M17 13v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6" />
        </svg>

        <span>Cart</span>

        <!-- Cart Count Badge -->
        @if($cartCount > 0)
            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center font-medium">
            {{ $cartCount }}
        </span>
        @endif
    </a>
</div>
