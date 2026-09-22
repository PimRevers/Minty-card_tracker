<?php

namespace App\Http\Controllers;

use App\Models\Carte;
use App\Models\CarteUtilisateur;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class CarteUtilisateurController extends Controller
{
    /**
     * Affiche la liste des cartes dans les collections des utilisateurs.
     */
    public function index()
    {
        $cartesUtilisateurs = CarteUtilisateur::with(['utilisateur', 'carte.cardable', 'carte.extension.jeu'])
            ->latest()
            ->paginate(20);

        return view('carte_utilisateur.index', compact('cartesUtilisateurs'));
    }

    /**
     * Affiche le formulaire d'ajout d'une carte à un utilisateur.
     */
    public function create()
    {
        $utilisateurs = Utilisateur::orderBy('pseudo')->get();
        $cartes = Carte::with(['extension', 'cardable'])->get();

        return view('carte_utilisateur.create', compact('utilisateurs', 'cartes'));
    }

    /**
     * Enregistre l'association entre une carte et un utilisateur.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'utilisateur_id' => 'required|exists:utilisateurs,id',
            'carte_id' => 'required|exists:cartes,id',
            'statut' => 'required|in:NM,EX,GD,LP',
            'quantite' => 'required|integer|min:1',
        ]);

        $carteUtilisateur = CarteUtilisateur::create($validated);

        return redirect()
            ->route('carte-utilisateur.show', $carteUtilisateur)
            ->with('success', 'La carte a été ajoutée à la collection de l\'utilisateur avec succès.');
    }

    /**
     * Affiche les détails d'une carte dans la collection d'un utilisateur.
     */
    public function show(CarteUtilisateur $carteUtilisateur)
    {
        $carteUtilisateur->load(['utilisateur', 'carte.cardable', 'carte.extension.jeu']);

        return view('carte_utilisateur.show', compact('carteUtilisateur'));
    }

    /**
     * Affiche le formulaire d'édition d'une carte dans la collection d'un utilisateur.
     */
    public function edit(CarteUtilisateur $carteUtilisateur)
    {
        $utilisateurs = Utilisateur::orderBy('pseudo')->get();
        $cartes = Carte::with(['extension', 'cardable'])->get();

        return view('carte_utilisateur.edit', compact('carteUtilisateur', 'utilisateurs', 'cartes'));
    }

    /**
     * Met à jour une carte dans la collection d'un utilisateur.
     */
    public function update(Request $request, CarteUtilisateur $carteUtilisateur)
    {
        $validated = $request->validate([
            'utilisateur_id' => 'required|exists:utilisateurs,id',
            'carte_id' => 'required|exists:cartes,id',
            'statut' => 'required|in:NM,EX,GD,LP',
            'quantite' => 'required|integer|min:1',
        ]);

        $carteUtilisateur->update($validated);

        return redirect()
            ->route('carte-utilisateur.show', $carteUtilisateur)
            ->with('success', 'La collection de l\'utilisateur a été mise à jour avec succès.');
    }

    /**
     * Supprime une carte de la collection d'un utilisateur.
     */
    public function destroy(CarteUtilisateur $carteUtilisateur)
    {
        $carteUtilisateur->delete();

        return redirect()
            ->route('carte-utilisateur.index')
            ->with('success', 'La carte a été retirée de la collection avec succès.');
    }
}
