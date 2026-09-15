<?php

namespace Database\Seeders;

use App\Models\Jeu;
use Illuminate\Database\Seeder;

class JeuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Jeu réel Star Wars: Unlimited
        Jeu::firstOrCreate(
            ['nom' => 'Star Wars: Unlimited'],
            [
                'logo' => 'https://starwarsunlimited.com/images/logo.png',
                'date_creation' => '2024-03-08 00:00:00',
                'description' => 'Star Wars: Unlimited est un jeu de cartes à collectionner rapide et dynamique où chaque joueur incarne un leader emblématique de la galaxie.',
            ]
        );

        // Autres jeux factices pour enrichir la base de test
        Jeu::factory(2)->create();
    }
}
