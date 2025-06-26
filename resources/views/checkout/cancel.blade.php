<x-layouts.app :title="__('Dashboard')">
    <div class="container mx-auto px-4 py-8 mt-16 text-center">
        <div class="max-w-md mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-md p-8">
            <div class="text-red-500 mb-4">
                <svg class="w-16 h-16 mx-auto" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
            </div>

            <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Payment Cancelled</h1>
            <p class="text-gray-600 dark:text-gray-300 mb-6">Your payment was cancelled. Your cart is still saved.</p>

            <div class="space-x-4">
                <a href="{{ route('cart') }}" class="bg-indigo-600 text-white px-6 py-3 rounded-md hover:bg-indigo-700 transition-colors">
                    Back to Cart
                </a>
                <a href="{{ route('products') }}" class="bg-gray-300 text-gray-700 px-6 py-3 rounded-md hover:bg-gray-400 transition-colors">
                    Continue Shopping
                </a>
            </div>
        </div>
    </div>
</x-layouts.app>
