<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Cashier\Billable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes, HasRoles, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'can_set_password',
        'google_id',
        'github_id',
        'avatar',
        'address',
        'city',
        'postal',
        'country',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'can_set_password' => 'boolean',
        ];
    }

    /**
     * The "booted" method of the model.
     * Automatically assign 'viewer' role to new users
     */
    protected static function booted(): void
    {
        static::created(function (User $user) {
            // Only assign a role if the user doesn't have any role yet
            if (!$user->hasAnyRole()) {
                $user->assignRole('viewer');
            }
        });
    }

    /**
     * Check if user registered with Google
     */
    public function registeredWithGoogle(): bool
    {
        return !is_null($this->google_id);
    }

    /**
     * Check if user registered with Github
     */
    public function registeredWithGithub(): bool
    {
        return !is_null($this->github_id);
    }

    /**
     * Check if user has a specific plan
     */
    public function hasPlan(string $planSlug): bool
    {
        $subscription = $this->subscription('default');

        if (! $subscription || ! $subscription->valid()) {
            return false;
        }

        $plan = \App\Models\Plan::where('stripe_price_id', $subscription->stripe_price)->first();

        return $plan && $plan->slug === $planSlug;
    }

    /**
     * Get the user's current plan
     */
    public function currentPlan()
    {
        $subscription = $this->subscription('default');

        if (! $subscription || ! $subscription->valid()) {
            return null;
        }

        return \App\Models\Plan::where('stripe_price_id', $subscription->stripe_price)->first();
    }

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->map(fn (string $name) => Str::of($name)->substr(0, 1))
            ->implode('');
    }

    /**
     * Get the user's avatar URL
     */
    public function getAvatarUrlAttribute(): string
    {
        return $this->avatar ?: asset('rv-favicon.png');
    }

    /**
     * Get subscription attribute
     */
    public function getSubscriptionAttribute()
    {
        return $this->subscription('default');
    }


}
