<?php

namespace Database\Seeders;

use App\Models\Extension;
use App\Models\Jeu;
use Illuminate\Database\Seeder;

class ExtensionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $swu = Jeu::where('nom', 'Star Wars: Unlimited')->first()
            ?? Jeu::factory()->create(['nom' => 'Star Wars: Unlimited']);

        // Extension 03 : Crépuscule de la République
        Extension::firstOrCreate(
            ['code' => 'TWI', 'jeu_id' => $swu->id],
            [
                'nom' => 'Crépuscule de la République',
                'nb_cartes' => 258,
            ]
        );

        // Extension 01 : Étincelle de Rébellion
        Extension::firstOrCreate(
            ['code' => 'SOR', 'jeu_id' => $swu->id],
            [
                'nom' => 'Étincelle de Rébellion',
                'nb_cartes' => 252,
            ]
        );

        // Extensions factices supplémentaires pour les tests
        Extension::factory(2)->create();
    }
}
