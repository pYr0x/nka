<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mietzahlung>
 */
class MietzahlungFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'mieteingang' => fake()->date(),
            'betrag' => fake()->numberBetween(800, 1000)
        ];
    }
}
