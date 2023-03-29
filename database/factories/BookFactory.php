<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->word(),
            'summary' => fake()->text(),
            'edition' => fake()->year(),
            'placement' => fake()->sentence(),
            'edited_at' => now(),
            'isbn' => fake()->numberBetween(1111111111, 9999999999),
            'number_of_copies' => fake()->numberBetween(1, 5),
            'rented_copies' => fake()->numberBetween(0,1)
        ];
    }
}
