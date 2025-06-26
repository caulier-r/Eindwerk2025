<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    @include('partials.head')
</head>
<body class="min-h-screen bg-white dark:bg-gray-900">
<flux:sidebar sticky stashable class="border-r border-gray-200 bg-indigo-700 dark:border-indigo-800 dark:bg-indigo-900">
    <flux:sidebar.toggle class="lg:hidden text-white hover:bg-indigo-600 dark:hover:bg-indigo-800" icon="x-mark"/>

    <a href="{{ route('home') }}" class="mr-5 flex items-center space-x-2" wire:navigate>
        <x-app-logo class="text-white"/>
    </a>

    <flux:navlist variant="outline" class="text-white">
        <flux:navlist.group heading="Platform" class="grid text-indigo-200">
            <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')"
                               wire:navigate class="text-white hover:bg-indigo-600 dark:hover:bg-indigo-800 data-[current]:bg-indigo-600 dark:data-[current]:bg-indigo-800">Dashboard</flux:navlist.item>
        </flux:navlist.group>
    </flux:navlist>

    <flux:navlist.item
        icon=""
        :href="route('cart')"
        :current="request()->routeIs('cart')"
        wire:navigate
        class="text-white hover:bg-indigo-600 dark:hover:bg-indigo-800 data-[current]:bg-indigo-600 dark:data-[current]:bg-indigo-800"
    >
        Cart
    </flux:navlist.item>

    {{-- Admin only items --}}
    @if(auth()->user()->hasRole('admin'))
        <flux:navlist.item
            icon="users"
            :href="route('users.index')"
            :current="request()->routeIs('users.index')"
            wire:navigate
            class="text-white hover:bg-indigo-600 dark:hover:bg-indigo-800 data-[current]:bg-indigo-600 dark:data-[current]:bg-indigo-800"
        >
            Users
        </flux:navlist.item>

        <flux:navlist.item
            icon="key"
            :href="route('roles.index')"
            :current="request()->routeIs('roles.index')"
            wire:navigate
            class="text-white hover:bg-indigo-600 dark:hover:bg-indigo-800 data-[current]:bg-indigo-600 dark:data-[current]:bg-indigo-800"
        >
            Roles
        </flux:navlist.item>

        <flux:navlist.item
            icon="cube"
            :href="route('admin.products.index')"
            :current="request()->routeIs('admin.products.*')"
            wire:navigate
            class="text-white hover:bg-indigo-600 dark:hover:bg-indigo-800 data-[current]:bg-indigo-600 dark:data-[current]:bg-indigo-800"
        >
            All Products
        </flux:navlist.item>
    @endif

{{--    --}}{{-- Items visible to all authenticated users --}}
{{--    <flux:navlist.item--}}
{{--        icon="credit-card"--}}
{{--        :href="route('subscriptions')"--}}
{{--        :current="request()->routeIs('subscriptions')"--}}
{{--        wire:navigate--}}
{{--        class="text-white hover:bg-indigo-600 dark:hover:bg-indigo-800 data-[current]:bg-indigo-600 dark:data-[current]:bg-indigo-800"--}}
{{--    >--}}
{{--        Subscriptions--}}
{{--    </flux:navlist.item>--}}

    <flux:navlist.item
        icon="document-text"
        :href="route('orders.index')"
        :current="request()->routeIs('orders.index')"
        wire:navigate
        class="text-white hover:bg-indigo-600 dark:hover:bg-indigo-800 data-[current]:bg-indigo-600 dark:data-[current]:bg-indigo-800"
    >
        Orders
    </flux:navlist.item>

    <flux:navlist.item
        icon="shopping-bag"
        :href="route('products')"
        :current="request()->routeIs('products')"
        wire:navigate
        class="text-white hover:bg-indigo-600 dark:hover:bg-indigo-800 data-[current]:bg-indigo-600 dark:data-[current]:bg-indigo-800"
    >
        Products
    </flux:navlist.item>

    <flux:spacer/>

    <!-- Desktop User Menu -->
    @auth
        <flux:dropdown position="bottom" align="start">
            @if(Auth::user()->avatar)
                <flux:button variant="ghost" class="w-full justify-start px-2">
                    <img class="h-8 w-8 rounded-full object-cover"
                         src="{{ Auth::user()->avatar_url }}"
                         alt="{{ Auth::user()->name }}">
                    <span class="ml-2 text-white">{{ auth()->user()->name }}</span>
                    <flux:icon name="chevrons-up-down" class="ml-auto text-white"/>
                </flux:button>
            @else
                <flux:profile
                    :name="auth()->user()->name"
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevrons-up-down"
                />
            @endif

            <flux:menu class="w-[220px]">
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                @if(Auth::user()->avatar)
                                    <img class="h-8 w-8 rounded-full object-cover"
                                         src="{{ Auth::user()->avatar_url }}"
                                         alt="{{ Auth::user()->name }}">
                                @else
                                    <span class="flex h-8 w-8 items-center justify-center rounded-full bg-indigo-600 text-white uppercase text-xs font-semibold">
                                        {{ substr(Auth::user()->initials(), 0, 2) }}
                                    </span>
                                @endif
                            </span>

                            <div class="grid flex-1 text-left text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                @php
                                    $subscription = auth()->user()->subscription('default');
                                    $plan = null;

                                    if ($subscription && $subscription->valid()) {
                                        $plan = \App\Models\Plan::where('stripe_price_id', $subscription->stripe_price)->first();
                                    }
                                @endphp

                                @if ($plan)
                                    <span class="truncate text-xs text-green-600">
                                        Plan: {{ $plan->name }}
                                    </span>
                                @else
                                    <span class="truncate text-xs text-red-500">
                                        No active plan
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator/>

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('settings.profile')" icon="cog"
                                    wire:navigate>Settings</flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator/>

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                        Log Out
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    @endauth
</flux:sidebar>

<!-- Mobile User Menu -->
@auth
    <flux:header class="lg:hidden">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left"/>

        <flux:spacer/>

        <flux:dropdown position="top" align="end">
            @if(Auth::user()->avatar)
                <flux:button variant="ghost" size="sm">
                    <img class="h-8 w-8 rounded-full object-cover"
                         src="{{ Auth::user()->avatar_url }}"
                         alt="{{ Auth::user()->name }}">
                    <flux:icon name="chevron-down" class="ml-2"/>
                </flux:button>
            @else
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />
            @endif

            <flux:menu>
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                @if(Auth::user()->avatar)
                                    <img class="h-8 w-8 rounded-full object-cover"
                                         src="{{ Auth::user()->avatar_url }}"
                                         alt="{{ Auth::user()->name }}">
                                @else
                                    <span class="flex h-8 w-8 items-center justify-center rounded-full bg-indigo-600 text-white uppercase text-xs font-semibold">
                                        {{ substr(Auth::user()->initials(), 0, 2) }}
                                    </span>
                                @endif
                            </span>

                            <div class="grid flex-1 text-left text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator/>

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('settings.profile')" icon="cog"
                                    wire:navigate>Settings</flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator/>

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                        Log Out
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:header>
@endauth

{{ $slot }}

@fluxScripts
</body>
</html>
