<?php

namespace App\Http\Controllers;

use App\Models\Carte;
use App\Models\CarteUtilisateur;
use App\Models\Extension;
use App\Models\Jeu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Affiche le tableau de bord V0 dédié à l'extension Crépuscule de la République.
     */
    public function index()
    {
        // Données V0 de l'extension unique : Crépuscule de la République (Star Wars: Unlimited)
        $extension = [
            'nom' => 'Crépuscule de la République',
            'code' => 'TWI',
            'jeu_nom' => 'Star Wars: Unlimited',
            'annee' => '2024',
            'total_cartes' => 258,
            'obtenues' => 78,
            'manquantes' => 180,
            'pourcentage' => 30.2,
            'regulieres_obtenues' => 64,
            'regulieres_total' => 160,
            'foils_obtenues' => 14,
            'foils_total' => 98,
        ];

        // 4 Dernières cartes obtenues (Pure collection, sans prix)
        $recentAcquisitions = [
            [
                'nom' => 'Anakin Skywalker',
                'sous_titre' => 'Chevalier Jedi • Héros',
                'ref' => '#011/258',
                'rarete' => 'Légendaire',
                'finition' => 'HYPERSPACE FOIL',
                'aspect' => 'Agressivité',
                'initiales' => 'AS',
                'date_obtention' => 'Obtenue hier',
                'bg_gradient' => 'from-amber-500/10 via-red-500/10 to-primary/10',
                'badge_finition' => 'bg-violet-100 text-violet-800 border-violet-200',
                'badge_rarete' => 'bg-amber-100 text-amber-800',
            ],
            [
                'nom' => 'Général Grievous',
                'sous_titre' => 'Tueur de Jedi • Séparatiste',
                'ref' => '#015/258',
                'rarete' => 'Rare',
                'finition' => 'STANDARD',
                'aspect' => 'Commandement',
                'initiales' => 'GG',
                'date_obtention' => 'Il y a 2j',
                'bg_gradient' => 'from-slate-600/10 via-red-600/10 to-slate-900/15',
                'badge_finition' => 'bg-slate-100 text-slate-700 border-slate-200',
                'badge_rarete' => 'bg-blue-100 text-blue-800',
            ],
            [
                'nom' => 'Obi-Wan Kenobi',
                'sous_titre' => 'Maître patient • Héros',
                'ref' => '#008/258',
                'rarete' => 'Rare',
                'finition' => 'FOIL',
                'aspect' => 'Vigilance',
                'initiales' => 'OW',
                'date_obtention' => 'Il y a 3j',
                'bg_gradient' => 'from-cyan-500/10 via-blue-500/10 to-primary/10',
                'badge_finition' => 'bg-violet-100 text-violet-800 border-violet-200',
                'badge_rarete' => 'bg-blue-100 text-blue-800',
            ],
            [
                'nom' => 'Capitaine Rex',
                'sous_titre' => 'Commandant du 501e',
                'ref' => '#094/258',
                'rarete' => 'Peu Commune',
                'finition' => 'STANDARD',
                'aspect' => 'Commandement',
                'initiales' => 'REX',
                'date_obtention' => '20 Oct.',
                'bg_gradient' => 'from-blue-500/10 via-emerald-500/10 to-slate-200/50',
                'badge_finition' => 'bg-slate-100 text-slate-700 border-slate-200',
                'badge_rarete' => 'bg-emerald-100 text-emerald-800',
            ],
        ];

        // Tentative d'enrichissement avec la BDD locale si configurée
        try {
            $extTwi = Extension::where('code', 'LIKE', '%TWI%')
                ->orWhere('nom', 'LIKE', '%Crépuscule%')
                ->first();

            if ($extTwi) {
                $extension['nom'] = $extTwi->nom;
                $extension['code'] = $extTwi->code;
                $dbTotal = $extTwi->cartes()->count();
                if ($dbTotal > 0) {
                    $extension['total_cartes'] = $dbTotal;
                }
            }
        } catch (\Throwable $e) {
            // Reste sur les données par défaut de l'extension
        }

        return view('dashboard', [
            'extension' => $extension,
            'recentAcquisitions' => $recentAcquisitions,
        ]);
    }

    /**
     * Affiche la page de profil et de préférences.
     */
    public function profile()
    {
        return view('profile');
    }

    /**
     * Affiche la liste des cartes possédées et la checklist du set.
     */
    public function mesCartes()
    {
        return view('mes-cartes');
    }
}
