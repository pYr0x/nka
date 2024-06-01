<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mietkost>
 */
class MietkostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'von' => fake()->dateTimeBetween('-1 year'),
            'bis' => fake()->date(),
            'kaltmiete' => fake()->numberBetween('550', '750'),
            'stellplatz' => null,
            'sonstiges' => null,
            'nebenkosten' => fake()->numberBetween('100', '160'),
        ];
    }
}
