<?php

namespace Database\Seeders;

use App\Models\Utilisateur;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UtilisateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Utilisateur de test principal
        Utilisateur::firstOrCreate(
            ['email' => 'test@minty.local'],
            [
                'nom' => 'Dupont',
                'prenom' => 'Jean',
                'pseudo' => 'jeandupont',
                'password' => Hash::make('password'),
            ]
        );

        // Utilisateurs aléatoires de test
        Utilisateur::factory(10)->create();
    }
}
