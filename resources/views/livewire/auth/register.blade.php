<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;

new #[Layout('components.layouts.auth')] class extends Component {
    use WithFileUploads;

    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public $avatar = null; // File upload property

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'avatar' => ['nullable', 'image', 'max:2048'], // max 2MB
        ]);

        $validated['password'] = Hash::make($validated['password']);

        // Handle avatar upload
        if ($this->avatar) {
            $avatarPath = $this->avatar->store('avatars', 'public');
            $validated['avatar'] = Storage::url($avatarPath);
        } else {
            // Use default avatar (your favicon)
            $validated['avatar'] = asset('rv-favicon.png');
        }

        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        $this->redirectIntended(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Create an account')" :description="__('Enter your details below to create your account')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="register" class="flex flex-col gap-6">
        <!-- Name -->
        <flux:input
            wire:model="name"
            :label="__('Name')"
            type="text"
            required
            autofocus
            autocomplete="name"
            :placeholder="__('Full name')"
        />

        <!-- Email Address -->
        <flux:input
            wire:model="email"
            :label="__('Email address')"
            type="email"
            required
            autocomplete="email"
            placeholder="email@example.com"
        />

        <!-- Avatar Upload -->
        <div>
            <flux:label for="avatar">Profile Picture (optional)</flux:label>
            <div class="mt-2 flex items-center gap-4">
                <!-- Avatar Preview -->
                <div class="relative">
                    @if ($avatar)
                        <img src="{{ $avatar->temporaryUrl() }}" class="h-20 w-20 rounded-full object-cover">
                    @else
                        <img src="{{ asset('rv-favicon.png') }}" class="h-20 w-20 rounded-full object-cover bg-gray-100">
                    @endif
                </div>

                <!-- Upload Button -->
                <div>
                    <flux:input
                        wire:model="avatar"
                        type="file"
                        id="avatar"
                        accept="image/*"
                        class="hidden"
                    />
                    <flux:button type="button" variant="outline" size="sm" onclick="document.getElementById('avatar').click()">
                        Choose Avatar
                    </flux:button>

                    @if ($avatar)
                        <flux:button type="button" variant="ghost" size="sm" wire:click="$set('avatar', null)" class="ml-2">
                            Remove
                        </flux:button>
                    @endif
                </div>
            </div>
            @error('avatar')
            <flux:error>{{ $message }}</flux:error>
            @enderror
        </div>

        <!-- Password -->
        <flux:input
            wire:model="password"
            :label="__('Password')"
            type="password"
            required
            autocomplete="new-password"
            :placeholder="__('Password')"
        />

        <!-- Confirm Password -->
        <flux:input
            wire:model="password_confirmation"
            :label="__('Confirm password')"
            type="password"
            required
            autocomplete="new-password"
            :placeholder="__('Confirm password')"
        />

        <div class="flex items-center justify-end">
            <flux:button type="submit" variant="primary" class="w-full">
                {{ __('Create account') }}
            </flux:button>
        </div>
    </form>

    <div class="space-x-1 text-center text-sm text-zinc-600 dark:text-zinc-400">
        {{ __('Already have an account?') }}
        <flux:link :href="route('login')" wire:navigate>{{ __('Log in') }}</flux:link>
    </div>
</div>
