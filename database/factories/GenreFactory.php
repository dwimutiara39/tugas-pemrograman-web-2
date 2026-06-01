<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class GenreFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'description' => fake()->sentence(),
            'status' => fake()->randomElement(['Active', 'Inactive']),
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}