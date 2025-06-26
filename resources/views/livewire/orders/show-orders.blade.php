<div class="p-6">
    <h2 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">My Orders</h2>

    @if ($orders->isEmpty())
        <div class="text-center py-12">
            <div class="text-gray-500 dark:text-gray-400 text-lg">
                <svg class="w-16 h-16 mx-auto mb-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 2L3 7v11a2 2 0 002 2h10a2 2 0 002-2V7l-7-5zM10 12a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
                </svg>
                <p>You don't have any orders yet.</p>
                <a href="{{ route('products') }}" class="text-indigo-600 hover:text-indigo-700 font-medium mt-2 inline-block">
                    Start shopping →
                </a>
            </div>
        </div>
    @else
        <div class="space-y-6">
            @foreach ($orders as $order)
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
                    <!-- Order Header -->
                    <div class="bg-gray-50 dark:bg-gray-700 px-6 py-4 border-b">
                        <div class="flex justify-between items-center">
                            <div>
                                <h3 class="font-semibold text-gray-900 dark:text-white">
                                    Order #{{ substr($order->transaction_id, 0, 8) }}...
                                </h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    {{ $order->created_at->format('F j, Y \a\t g:i A') }}
                                </p>
                            </div>
                            <div class="text-right">
                                <div class="text-lg font-bold text-gray-900 dark:text-white">
                                    €{{ number_format($order->amount, 2) }}
                                </div>
                                <span class="inline-flex items-center text-xs font-medium px-2.5 py-0.5 rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">
                                    <span class="w-2 h-2 me-1 rounded-full bg-green-500"></span>
                                    Paid
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Order Items -->
                    <div class="px-6 py-4">
                        <h4 class="font-medium text-gray-700 dark:text-gray-300 mb-3">Items purchased:</h4>
                        <div class="space-y-2">
                            @foreach ($order->orderItems as $item)
                                <div class="flex justify-between items-center py-2 border-b border-gray-100 dark:border-gray-600 last:border-b-0">
                                    <div class="flex items-center space-x-3">
                                        @if($item->product->image && file_exists(storage_path('app/public/' . $item->product->image)))
                                            <img src="{{ asset('storage/' . $item->product->image) }}"
                                                 alt="{{ $item->product->name }}"
                                                 class="w-12 h-12 object-cover rounded">
                                        @else
                                            <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-600 rounded flex items-center justify-center">
                                                <span class="text-white font-bold text-lg">{{ substr($item->product->name, 0, 1) }}</span>
                                            </div>
                                        @endif
                                        <div>
                                            <p class="font-medium text-gray-900 dark:text-white">{{ $item->product->name }}</p>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">Quantity: {{ $item->quantity }}</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-medium text-gray-900 dark:text-white">€{{ number_format($item->price, 2) }}</p>
                                        @if($item->quantity > 1)
                                            <p class="text-xs text-gray-500">€{{ number_format($item->price / $item->quantity, 2) }} each</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Order Actions -->
                    <div class="bg-gray-50 dark:bg-gray-700 px-6 py-3">
                        <div class="flex justify-between items-center">
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Stripe ID: {{ substr($order->stripe_customer_id, 0, 20) }}...
                            </p>
                            <a href="{{ route('orders.show', $order->id) }}"
                               class="inline-flex items-center px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-600 hover:bg-gray-50 dark:hover:bg-gray-500 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10 3C5 3 1.73 7.11 1 10c.73 2.89 4 7 9 7s8.27-4.11 9-7c-.73-2.89-4-7-9-7zM10 15a5 5 0 110-10 5 5 0 010 10z"/>
                                    <path d="M10 7a3 3 0 100 6 3 3 0 000-6z"/>
                                </svg>
                                View Invoice
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
