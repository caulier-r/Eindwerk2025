<?php

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;
use App\Models\User;

new #[Layout('components.layouts.auth')] class extends Component {
    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    public bool $remember = false;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();
        $this->ensureIsNotRateLimited();

        $user = User::where('email', $this->email)->first();

        if ($user && $user->google_id && !$user->password) {
            throw ValidationException::withMessages([
                'email' => 'Dit account is gekoppeld aan Google. Log in met Google.',
            ]);
        }

        if ($user && $user->github_id && !$user->password) {
            throw ValidationException::withMessages([
                'email' => 'Dit account is gekoppeld aan GitHub. Log in met GitHub.',
            ]);
        }

        if ($user && !$user->password && !$user->google_id && !$user->github_id) {
            throw ValidationException::withMessages([
                'email' => 'Dit account heeft nog geen wachtwoord. Stel eerst een wachtwoord in via de wachtwoordpagina.',
            ]);
        }

        if (! Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
        Session::regenerate();

        $this->redirectIntended(route('home'), navigate: true);
    }

    /**
     * Ensure the authentication request is not rate limited.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => __('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email).'|'.request()->ip());
    }
}; ?>

<div class="flex flex-col gap-6">
    <x-auth-header
        :title="__('Welcome back 👋')"
        :description="__('Log in to manage your plugins, bots, and tools – all in one place.')"
    />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="login" class="flex flex-col gap-6">
        <!-- Email Address -->
        <flux:input
            wire:model="email"
            :label="__('Email address')"
            type="email"
            required
            autofocus
            autocomplete="email"
            placeholder="you@yourmail.com"
        />

        <!-- Password -->
        <div class="relative">
            <flux:input
                wire:model="password"
                :label="__('Password')"
                type="password"
                required
                autocomplete="current-password"
                :placeholder="__('Your secret password 🔐')"
            />

            @if (Route::has('password.request'))
                <flux:link class="absolute right-0 top-0 text-sm" :href="route('password.request')" wire:navigate>
                    {{ __('Forgot your password?') }}
                </flux:link>
            @endif
        </div>

        <!-- Remember Me -->
        <flux:checkbox wire:model="remember" :label="__('Keep me logged in')" />

        <div class="relative w-full">
            <div class="animated-border">
                <flux:button
                    type="submit"
                    class="w-full px-6 py-3 bg-slate-900 text-white font-semibold rounded-xl hover:bg-slate-800 transition"
                >
                    Log me in 🚀
                </flux:button>
            </div>
        </div>
    </form>

    <div class="relative text-center">
        <div class="my-4 flex items-center justify-center space-x-2 text-sm text-zinc-500 dark:text-zinc-400">
            <span class="w-1/5 border-t"></span>
            <span>{{ __('or log in with') }}</span>
            <span class="w-1/5 border-t"></span>
        </div>
        <div class="space-y-4">
            <livewire:auth.google-login />
            <livewire:auth.github-login />
        </div>
    </div>

    @if (Route::has('register'))
        <div class="space-x-1 text-center text-sm text-zinc-600 dark:text-zinc-400">
            {{ __('New here?') }}
            <flux:link :href="route('register')" wire:navigate>
                {{ __('Create your free account') }}
            </flux:link>
        </div>
    @endif
</div>
