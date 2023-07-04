<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'biography' => $this->faker->realText(),
            'public' => $this->faker->boolean(),
            'created_at' => $this->faker->dateTimeBetween('-30 days', now())
        ];
    }
}
