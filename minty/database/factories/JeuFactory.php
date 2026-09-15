<?php

namespace Database\Factories;

use App\Models\Jeu;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Jeu>
 */
class JeuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => ucfirst(fake()->words(2, true)),
            'logo' => fake()->imageUrl(200, 200, 'games', true),
            'date_creation' => fake()->dateTimeBetween('-10 years', 'now'),
            'description' => fake()->paragraph(),
        ];
    }
}
