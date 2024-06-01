<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mieteinheit>
 */
class MieteinheitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nr' => fake()->unique()->randomNumber(2),
            'wohnflaeche' => fake()->numberBetween(50, 100),
        ];
    }
}
