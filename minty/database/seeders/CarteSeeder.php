<?php

namespace Database\Seeders;

use App\Models\Carte;
use App\Models\Extension;
use App\Models\TypeSwu;
use Illuminate\Database\Seeder;

class CarteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Récupère l'extension Crépuscule de la République
        $extension = Extension::where('code', 'TWI')->first()
            ?? Extension::factory()->create(['code' => 'TWI', 'nom' => 'Crépuscule de la République']);

        // Associe tous les types SWU importés à une Carte dans cette extension
        $typesSwu = TypeSwu::all();

        foreach ($typesSwu as $typeSwu) {
            Carte::firstOrCreate([
                'extension_id' => $extension->id,
                'cardable_type' => TypeSwu::class,
                'cardable_id' => $typeSwu->id,
            ]);
        }

        // Quelques cartes aléatoires supplémentaires pour les tests
        Carte::factory(5)->create();
    }
}
