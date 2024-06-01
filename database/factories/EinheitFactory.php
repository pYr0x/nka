<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Einheit>
 */
class EinheitFactory extends Factory {

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            'bezeichnung' => fake()->word(),
            'abkuerzung'  => fake()->randomElement(['pschl', 'Stk', 'm²', 'm³', 'kwh']),
        ];
    }
}
