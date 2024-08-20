<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            # unique name
            'name' => fake()->unique()->word(),
            'description' => fake()->sentence(10),
            'price' => fake()->numberBetween(50000, 2000000),
            'amount' => fake()->numberBetween(1, 100),
            'category_id' => fake()->numberBetween(1, 10),
        ];
    }
}
