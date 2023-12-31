<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feedback>
 */
class FeedbackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Return fake data for database seeding.
        return [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'content' => fake()->text(),
            'type' => fake()->randomElement([1, 2])
        ];
    }
}
