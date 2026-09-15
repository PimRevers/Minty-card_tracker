<?php

namespace Database\Factories;

use App\Models\TypeSwu;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TypeSwu>
 */
class TypeSwuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image_recto' => fake()->imageUrl(),
            'image_verso' => fake()->imageUrl(),
            'nom' => fake()->name(),
            'sous_nom' => fake()->word(),
            'affinites' => ['Vigilance'],
            'types' => ['Unité'],
            'arene' => 'Terrestre',
            'mot_cles' => [],
            'cout' => fake()->numberBetween(1, 10),
            'traits' => [fake()->word()],
            'puissance' => fake()->numberBetween(1, 10),
            'rarete' => fake()->randomElement(['Commune', 'Peu commune', 'Rare', 'Légendaire']),
            'pv' => fake()->numberBetween(1, 10),
            'description_recto' => fake()->paragraph(),
            'description_verso' => fake()->paragraph(),
            'up_puiss' => 0,
            'up_pv' => 0,
        ];
    }
}
