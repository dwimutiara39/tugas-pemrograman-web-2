<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Movie>
 */
class MovieFactory extends Factory
{
    
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'genre' => $this->faker->randomElement(['Action', 'Drama', 'Comedy', 'Horror', 'Sci-Fi']),
            'year' => $this->faker->numberBetween(1990, 2025),
            'director' => $this->faker->name(),
            'description' => $this->faker->paragraph(),
        ];
    }
}
