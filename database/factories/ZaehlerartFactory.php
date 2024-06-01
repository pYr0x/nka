<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Zaehlerart>
 */
class ZaehlerartFactory extends Factory {

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            'bezeichnung'  => fake()->randomElement(
                ['Wasser', 'Warmwasser', 'Kaltwasser', 'Kaltwasser Waschraum', 'Heizung', 'Gas', 'Strom']
            ),
            'zuordnung'    => fake()->randomElement(['Mieteinheit', 'Allgemein', 'Hauptzähler']),
            'beschreibung' => fake()->paragraph(1),
        ];
    }
}
