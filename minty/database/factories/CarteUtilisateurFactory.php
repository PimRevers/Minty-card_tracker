<?php

namespace Database\Factories;

use App\Models\Carte;
use App\Models\CarteUtilisateur;
use App\Models\Utilisateur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CarteUtilisateur>
 */
class CarteUtilisateurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'utilisateur_id' => Utilisateur::factory(),
            'carte_id' => Carte::factory(),
            'statut' => fake()->randomElement(['NM', 'EX', 'GD', 'LP']),
            'quantite' => fake()->numberBetween(1, 4),
        ];
    }
}
