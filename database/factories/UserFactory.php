<?php

namespace Database\Factories;

use App\Enums\UserRole;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'full_name' => fake()->firstName() . ' ' . fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'role' => UserRole::PASSENGER,
            'remember_token' => Str::random(10),
        ];
    }
    public function admin(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => UserRole::ADMIN,
            ];
        });
    }

    public function operator(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => UserRole::OPERATOR,
            ];
        });
    }
}