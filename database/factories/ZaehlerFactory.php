<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Zaehler>
 */
class ZaehlerFactory extends Factory {

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            'nummer'      => fake()->randomNumber(),
            'einbau'      => fake()->dateTimeThisDecade(),
            'eichung_bis' => fake()->dateTimeThisDecade(),
        ];
    }
}
