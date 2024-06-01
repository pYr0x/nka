<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kosten>
 */
class RechnungFactory extends Factory {

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            'bezeichnung'     => fake()->word(),
            'betrag'          => fake()->randomFloat(),
            'verbrauch'       => fake()->randomFloat(),
            'abrechnungsjahr' => fake()->year(),
            'rechnungsnummer' => fake()->dateTimeThisDecade(),
        ];
    }
}
