<?php

namespace Database\Seeders;

use App\Models\TypeSwu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class TypeSwuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonPath = database_path('data/swu_03.json');

        if (File::exists($jsonPath)) {
            $cards = json_decode(File::get($jsonPath), true);

            foreach ($cards as $card) {
                TypeSwu::firstOrCreate(
                    [
                        'nom' => $card['nom'],
                        'sous_nom' => $card['sous_nom'] ?? '',
                    ],
                    [
                        'image_recto' => $card['image_recto'] ?? '',
                        'image_verso' => $card['image_verso'] ?? '',
                        'affinites' => $card['affinites'] ?? [],
                        'types' => $card['types'] ?? [],
                        'arene' => $card['arene'] ?? '',
                        'mot_cles' => $card['mot_cles'] ?? $card['mots_cles'] ?? [],
                        'cout' => $card['cout'] ?? 0,
                        'traits' => $card['traits'] ?? [],
                        'puissance' => $card['puissance'] ?? 0,
                        'rarete' => $card['rarete'] ?? 'Commune',
                        'pv' => $card['pv'] ?? 0,
                        'description_recto' => $card['description_recto'] ?? '',
                        'description_verso' => $card['description_verso'] ?? '',
                        'up_puiss' => $card['up_puiss'] ?? 0,
                        'up_pv' => $card['up_pv'] ?? 0,
                    ]
                );
            }
        } else {
            TypeSwu::factory(10)->create();
        }
    }
}
