<?php

namespace Database\Factories\Modules\Authentication\Models;

use App\Modules\Authentication\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Modules\Authentication\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->unique()->phoneNumber(),
            'national_id' => $this->faker->unique()->numerify('##############'),
            'user_type' => $this->faker->randomElement(['student', 'teacher', 'school_admin', 'ministry_admin']),
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'is_active' => true,
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function inactive(): static
    {
        return $this->state(fn(array $attributes) => [
            'is_active' => false,
        ]);
    }

    public function ministryAdmin(): static
    {
        return $this->state(fn(array $attributes) => [
            'user_type' => 'ministry_admin',
        ]);
    }

    public function schoolAdmin(): static
    {
        return $this->state(fn(array $attributes) => [
            'user_type' => 'school_admin',
        ]);
    }

    public function teacher(): static
    {
        return $this->state(fn(array $attributes) => [
            'user_type' => 'teacher',
        ]);
    }

    public function student(): static
    {
        return $this->state(fn(array $attributes) => [
            'user_type' => 'student',
        ]);
    }
}
