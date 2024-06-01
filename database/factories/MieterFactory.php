<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mieter>
 */
class MieterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nachname' => fake()->lastName(),
            'vorname' => fake()->firstName(),
            'geburtsdatum' => fake()->dateTimeInInterval('-40 years', '+ 10 years')
        ];
    }
}
