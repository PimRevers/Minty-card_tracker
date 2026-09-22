<?php

namespace App\Http\Controllers;

use App\Models\Jeu;
use Illuminate\Http\Request;

class JeuController extends Controller
{
    /**
     * Affiche la liste des jeux.
     */
    public function index()
    {
        $jeux = Jeu::withCount('extensions')->latest()->paginate(12);

        return view('jeux.index', compact('jeux'));
    }

    /**
     * Affiche le formulaire de création d'un jeu.
     */
    public function create()
    {
        return view('jeux.create');
    }

    /**
     * Enregistre un nouveau jeu dans la base de données.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'logo' => 'required|string|max:255',
            'date_creation' => 'required|date',
            'description' => 'required|string',
        ]);

        $jeu = Jeu::create($validated);

        return redirect()
            ->route('jeux.show', $jeu)
            ->with('success', 'Le jeu a été créé avec succès.');
    }

    /**
     * Affiche les détails d'un jeu et ses extensions.
     */
    public function show(Jeu $jeu)
    {
        $jeu->load('extensions');

        return view('jeux.show', compact('jeu'));
    }

    /**
     * Affiche le formulaire d'édition d'un jeu.
     */
    public function edit(Jeu $jeu)
    {
        return view('jeux.edit', compact('jeu'));
    }

    /**
     * Met à jour un jeu dans la base de données.
     */
    public function update(Request $request, Jeu $jeu)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'logo' => 'required|string|max:255',
            'date_creation' => 'required|date',
            'description' => 'required|string',
        ]);

        $jeu->update($validated);

        return redirect()
            ->route('jeux.show', $jeu)
            ->with('success', 'Le jeu a été mis à jour avec succès.');
    }

    /**
     * Supprime un jeu de la base de données.
     */
    public function destroy(Jeu $jeu)
    {
        $jeu->delete();

        return redirect()
            ->route('jeux.index')
            ->with('success', 'Le jeu a été supprimé avec succès.');
    }
}
