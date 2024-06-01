<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mietvertrag>
 */
class MietvertragFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $date = fake()->dateTimeThisDecade();
        return [
            'datum' => $date,
            'beginn' => $date->add(\DateInterval::createFromDateString('+1 day'))
        ];
    }
}
