<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <!-- Card Section -->
        <div class="">
            <!-- Grid -->
            <div class="grid md:grid-cols-4 border border-gray-200 shadow-2xs rounded-xl overflow-hidden dark:border-neutral-800">
                <!-- Card Total Users -->
                <a class="block p-4 md:p-5 relative bg-white hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 before:absolute before:top-0 before:start-0 before:w-full before:h-px md:before:w-px md:before:h-full before:bg-gray-200 first:before:bg-transparent dark:bg-neutral-900 dark:before:bg-neutral-800 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="{{ route('users.index') }}">
                    <div class="flex md:flex flex-col lg:flex-row gap-y-3 gap-x-5">
                        <svg class="shrink-0 size-5 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>

                        <div class="grow">
                            <p class="text-xs uppercase font-medium text-gray-800 dark:text-neutral-200">
                                Total users
                            </p>
                            <h3 class="mt-1 text-xl sm:text-2xl font-semibold text-blue-600 dark:text-blue-500">
                                {{ number_format($totalUsers) }}
                            </h3>
                            <div class="mt-1 flex justify-between items-center">
                                <p class="text-sm text-gray-500 dark:text-neutral-500">
                                    from <span class="font-semibold text-gray-800 dark:text-neutral-200">{{ number_format($lastMonthUsers) }}</span>
                                </p>
                                <span class="ms-1 inline-flex items-center gap-1.5 py-1 px-2 rounded-md text-xs font-medium bg-gray-200 text-gray-800 dark:bg-neutral-800 dark:text-neutral-200">
                                    @if($userGrowth >= 0)
                                        <svg class="inline-block size-3 self-center" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                                        </svg>
                                    @else
                                        <svg class="inline-block size-3 self-center" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                        </svg>
                                    @endif
                                    <span class="inline-block">
                                        {{ abs($userGrowth) }}%
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- End Card -->

                <!-- Card Orders -->
                <a class="block p-4 md:p-5 relative bg-white hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 before:absolute before:top-0 before:start-0 before:w-full before:h-px md:before:w-px md:before:h-full before:bg-gray-200 first:before:bg-transparent dark:bg-neutral-900 dark:before:bg-neutral-800 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="{{ route('orders.index') }}">
                    <div class="flex md:flex flex-col lg:flex-row gap-y-3 gap-x-5">
                        <svg class="shrink-0 size-5 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/></svg>

                        <div class="grow">
                            <p class="text-xs uppercase font-medium text-gray-800 dark:text-neutral-200">
                                Total Orders
                            </p>
                            <h3 class="mt-1 text-xl sm:text-2xl font-semibold text-blue-600 dark:text-blue-500">
                                {{ number_format($totalOrders) }}
                            </h3>
                            <div class="mt-1 flex justify-between items-center">
                                <p class="text-sm text-gray-500 dark:text-neutral-500">
                                    from <span class="font-semibold text-gray-800 dark:text-neutral-200">{{ number_format($lastMonthOrders) }}</span>
                                </p>
                                <span class="ms-1 inline-flex items-center gap-1.5 py-1 px-2 rounded-md text-xs font-medium bg-gray-200 text-gray-800 dark:bg-neutral-800 dark:text-neutral-200">
                                    @if($orderGrowth >= 0)
                                        <svg class="inline-block size-3 self-center" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                                        </svg>
                                    @else
                                        <svg class="inline-block size-3 self-center" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                        </svg>
                                    @endif
                                    <span class="inline-block">
                                        {{ abs($orderGrowth) }}%
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- End Card -->

                <!-- Card Active Sessions -->
                <a class="block p-4 md:p-5 relative bg-white hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 before:absolute before:top-0 before:start-0 before:w-full before:h-px md:before:w-px md:before:h-full before:bg-gray-200 first:before:bg-transparent dark:bg-neutral-900 dark:before:bg-neutral-800 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">
                    <div class="flex md:flex flex-col lg:flex-row gap-y-3 gap-x-5">
                        <svg class="shrink-0 size-5 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 22h14"/><path d="M5 2h14"/><path d="M17 22v-4.172a2 2 0 0 0-.586-1.414L12 12l-4.414 4.414A2 2 0 0 0 7 17.828V22"/><path d="M7 2v4.172a2 2 0 0 0 .586 1.414L12 12l4.414-4.414A2 2 0 0 0 17 6.172V2"/></svg>

                        <div class="grow">
                            <p class="text-xs uppercase font-medium text-gray-800 dark:text-neutral-200">
                                Active Sessions
                            </p>
                            <h3 class="mt-1 text-xl sm:text-2xl font-semibold text-blue-600 dark:text-blue-500">
                                {{ $activeSessions }}
                            </h3>
                            <div class="mt-1 flex justify-between items-center">
                                <p class="text-sm text-gray-500 dark:text-neutral-500">
                                    of <span class="font-semibold text-gray-800 dark:text-neutral-200">{{ $totalSessions }}</span> total
                                </p>
                                <span class="ms-1 inline-flex items-center gap-1.5 py-1 px-2 rounded-md text-xs font-medium bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-200">
                                    <span class="inline-block">
                                        {{ $sessionPercentage }}%
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- End Card -->

                <!-- Card Products -->
                <a class="block p-4 md:p-5 relative bg-white hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 before:absolute before:top-0 before:start-0 before:w-full before:h-px md:before:w-px md:before:h-full before:bg-gray-200 first:before:bg-transparent dark:bg-neutral-900 dark:before:bg-neutral-800 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="{{ route('products') }}">
                    <div class="flex md:flex flex-col lg:flex-row gap-y-3 gap-x-5">
                        <svg class="shrink-0 size-5 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9h18v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9Z"/><path d="m3 9 2.45-4.9A2 2 0 0 1 7.24 3h9.52a2 2 0 0 1 1.8 1.1L21 9"/><path d="M12 3v6"/></svg>

                        <div class="grow">
                            <p class="text-xs uppercase font-medium text-gray-800 dark:text-neutral-200">
                                Total Products
                            </p>
                            <h3 class="mt-1 text-xl sm:text-2xl font-semibold text-blue-600 dark:text-blue-500">
                                {{ number_format($totalProducts) }}
                            </h3>
                            <div class="mt-1 flex justify-between items-center">
                                <p class="text-sm text-gray-500 dark:text-neutral-500">
                                    Active products
                                </p>
                                <span class="ms-1 inline-flex items-center gap-1.5 py-1 px-2 rounded-md text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-800 dark:text-blue-200">
                                    <span class="inline-block">
                                        View all
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- End Card -->
            </div>
            <!-- End Grid -->
        </div>
        <!-- End Card Section -->
    </div>
</x-layouts.app>
