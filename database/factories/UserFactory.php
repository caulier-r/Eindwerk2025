<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'can_set_password' => true,
            'remember_token' => Str::random(10),

            // Champs Google et Github
            'google_id' => null, // ou Str::random(16) si tu veux tester avec une valeur
            'github_id' => null,
            'avatar' => $this->faker->imageUrl(),

        ];
    }

    /**
     * Configure the model factory to assign the viewer role by default.
     */
    public function configure()
    {
        return $this->afterCreating(function ($user) {
            $role = Role::firstOrCreate(['name' => 'viewer']);
            $user->assignRole($role);
        });
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function admin(): static
    {
        return $this->afterCreating(function ($user) {
            $role = Role::firstOrCreate(['name' => 'admin']);
            $user->assignRole($role);
        })->state(fn () => [
            'name' => 'robin caulier',
            'email' => 'robincaulier3@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'can_set_password' => true,

            'google_id' => null,
            'github_id' => null,
            'avatar' => 'https://ui-avatars.com/api/?name=Admin+Gebruiker', // image par défaut

        ]);
    }
}
