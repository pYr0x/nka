<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mietobjekt>
 */
class MietobjektFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'strasse' => fake()->streetName(),
            'hausnummer' => fake()->buildingNumber(),
            'plz' => fake()->postcode(),
            'ort' => fake()->city(),
            'flurstueck' => fake()->randomNumber(5, true),
            'grundstuecksgroeße' => fake()->randomNumber(3, true)
        ];
    }
}
