<x-layouts.app :title="__('Dashboard')">
    <div class="container mx-auto px-4 py-8 mt-16 text-center">
        <div class="max-w-md mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-md p-8">
            <div class="text-green-500 mb-4">
                <svg class="w-16 h-16 mx-auto" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
            </div>

            <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Payment Successful!</h1>
            <p class="text-gray-600 dark:text-gray-300 mb-6">Thank you for your order. You will receive a confirmation email shortly.</p>

            <div class="space-y-3">
                <a href="{{ route('products') }}" class="block w-full bg-indigo-600 text-white px-6 py-3 rounded-md hover:bg-indigo-700 transition-colors">
                    Continue Shopping
                </a>

                <!-- Test button voor GIP demo -->
                <a href="{{ route('test.mark-paid') }}" class="block w-full bg-green-600 text-white px-6 py-3 rounded-md hover:bg-green-700 transition-colors">
                    Complete Order (Demo)
                </a>
            </div>
        </div>
    </div>
</x-layouts.app>

