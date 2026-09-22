<?php

namespace App\Http\Controllers;

use App\Models\TypeSwu;
use Illuminate\Http\Request;

class TypeSwuController extends Controller
{
    /**
     * Affiche la liste des cartes Star Wars Unlimited.
     */
    public function index()
    {
        $typesSwu = TypeSwu::withCount('cartes')
            ->latest()
            ->paginate(15);

        return view('type_swu.index', compact('typesSwu'));
    }

    /**
     * Affiche le formulaire de création d'une carte SWU.
     */
    public function create()
    {
        return view('type_swu.create');
    }

    /**
     * Enregistre une nouvelle carte SWU dans la base de données.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image_recto' => 'required|string|max:255',
            'image_verso' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'sous_nom' => 'nullable|string|max:255',
            'affinites' => 'nullable|array',
            'types' => 'nullable|array',
            'arene' => 'required|string|max:255',
            'mot_cles' => 'nullable|array',
            'cout' => 'required|integer|min:0',
            'traits' => 'nullable|array',
            'puissance' => 'required|integer',
            'rarete' => 'required|string|max:50',
            'pv' => 'required|integer',
            'description_recto' => 'nullable|string',
            'description_verso' => 'nullable|string',
            'up_puiss' => 'nullable|integer',
            'up_pv' => 'nullable|integer',
        ]);

        $typeSwu = TypeSwu::create($validated);

        return redirect()
            ->route('type-swu.show', $typeSwu)
            ->with('success', 'La fiche de carte Star Wars Unlimited a été créée avec succès.');
    }

    /**
     * Affiche les détails d'une carte SWU.
     */
    public function show(TypeSwu $typeSwu)
    {
        $typeSwu->load('cartes.extension.jeu');

        return view('type_swu.show', compact('typeSwu'));
    }

    /**
     * Affiche le formulaire d'édition d'une carte SWU.
     */
    public function edit(TypeSwu $typeSwu)
    {
        return view('type_swu.edit', compact('typeSwu'));
    }

    /**
     * Met à jour une carte SWU dans la base de données.
     */
    public function update(Request $request, TypeSwu $typeSwu)
    {
        $validated = $request->validate([
            'image_recto' => 'required|string|max:255',
            'image_verso' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'sous_nom' => 'nullable|string|max:255',
            'affinites' => 'nullable|array',
            'types' => 'nullable|array',
            'arene' => 'required|string|max:255',
            'mot_cles' => 'nullable|array',
            'cout' => 'required|integer|min:0',
            'traits' => 'nullable|array',
            'puissance' => 'required|integer',
            'rarete' => 'required|string|max:50',
            'pv' => 'required|integer',
            'description_recto' => 'nullable|string',
            'description_verso' => 'nullable|string',
            'up_puiss' => 'nullable|integer',
            'up_pv' => 'nullable|integer',
        ]);

        $typeSwu->update($validated);

        return redirect()
            ->route('type-swu.show', $typeSwu)
            ->with('success', 'La fiche de carte Star Wars Unlimited a été mise à jour avec succès.');
    }

    /**
     * Supprime une carte SWU de la base de données.
     */
    public function destroy(TypeSwu $typeSwu)
    {
        $typeSwu->delete();

        return redirect()
            ->route('type-swu.index')
            ->with('success', 'La fiche de carte Star Wars Unlimited a été supprimée avec succès.');
    }
}
