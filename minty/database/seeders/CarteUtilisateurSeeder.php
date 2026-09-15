<?php

namespace Database\Seeders;

use App\Models\Carte;
use App\Models\CarteUtilisateur;
use App\Models\Utilisateur;
use Illuminate\Database\Seeder;

class CarteUtilisateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $utilisateurs = Utilisateur::all();
        $cartes = Carte::all();

        if ($utilisateurs->isEmpty() || $cartes->isEmpty()) {
            return;
        }

        foreach ($utilisateurs as $utilisateur) {
            // Assigne entre 5 et 15 cartes aléatoires à chaque utilisateur
            $cartesAttribuees = $cartes->random(min(rand(5, 15), $cartes->count()));

            foreach ($cartesAttribuees as $carte) {
                CarteUtilisateur::firstOrCreate(
                    [
                        'utilisateur_id' => $utilisateur->id,
                        'carte_id' => $carte->id,
                    ],
                    [
                        'statut' => fake()->randomElement(['NM', 'EX', 'GD', 'LP']),
                        'quantite' => rand(1, 4),
                    ]
                );
            }
        }
    }
}
