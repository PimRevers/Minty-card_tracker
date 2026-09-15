<?php

namespace Database\Factories;

use App\Models\Extension;
use App\Models\Jeu;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Extension>
 */
class ExtensionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => fake()->word(),
            'code' => strtoupper(fake()->lexify('???')),
            'nb_cartes' => fake()->numberBetween(50, 300),
            'jeu_id' => Jeu::factory(),
        ];
    }
}
