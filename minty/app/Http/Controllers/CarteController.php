<?php

namespace App\Http\Controllers;

use App\Models\Carte;
use App\Models\Extension;
use Illuminate\Http\Request;

class CarteController extends Controller
{
    /**
     * Affiche la liste des cartes.
     */
    public function index()
    {
        $cartes = Carte::with(['extension.jeu', 'cardable'])
            ->withCount('utilisateurs')
            ->latest()
            ->paginate(20);

        return view('cartes.index', compact('cartes'));
    }

    /**
     * Affiche le formulaire de création d'une carte.
     */
    public function create()
    {
        $extensions = Extension::with('jeu')->orderBy('nom')->get();

        return view('cartes.create', compact('extensions'));
    }

    /**
     * Enregistre une nouvelle carte dans la base de données.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'extension_id' => 'required|exists:extensions,id',
            'cardable_id' => 'required|integer',
            'cardable_type' => 'required|string|max:255',
        ]);

        $carte = Carte::create($validated);

        return redirect()
            ->route('cartes.show', $carte)
            ->with('success', 'La carte a été créée avec succès.');
    }

    /**
     * Affiche les détails d'une carte.
     */
    public function show(Carte $carte)
    {
        $carte->load(['extension.jeu', 'cardable', 'utilisateurs']);

        return view('cartes.show', compact('carte'));
    }

    /**
     * Affiche le formulaire d'édition d'une carte.
     */
    public function edit(Carte $carte)
    {
        $extensions = Extension::with('jeu')->orderBy('nom')->get();

        return view('cartes.edit', compact('carte', 'extensions'));
    }

    /**
     * Met à jour une carte dans la base de données.
     */
    public function update(Request $request, Carte $carte)
    {
        $validated = $request->validate([
            'extension_id' => 'required|exists:extensions,id',
            'cardable_id' => 'required|integer',
            'cardable_type' => 'required|string|max:255',
        ]);

        $carte->update($validated);

        return redirect()
            ->route('cartes.show', $carte)
            ->with('success', 'La carte a été mise à jour avec succès.');
    }

    /**
     * Supprime une carte de la base de données.
     */
    public function destroy(Carte $carte)
    {
        $carte->delete();

        return redirect()
            ->route('cartes.index')
            ->with('success', 'La carte a été supprimée avec succès.');
    }
}
