<?php

namespace App\Http\Controllers;

use App\Models\Extension;
use App\Models\Jeu;
use Illuminate\Http\Request;

class ExtensionController extends Controller
{
    /**
     * Affiche la liste des extensions.
     */
    public function index()
    {
        $extensions = Extension::with('jeu')
            ->withCount('cartes')
            ->latest()
            ->paginate(15);

        return view('extensions.index', compact('extensions'));
    }

    /**
     * Affiche le formulaire de création d'une extension.
     */
    public function create()
    {
        $jeux = Jeu::orderBy('nom')->get();

        return view('extensions.create', compact('jeux'));
    }

    /**
     * Enregistre une nouvelle extension dans la base de données.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'code' => 'required|string|max:50',
            'nb_cartes' => 'required|integer|min:1',
            'jeu_id' => 'required|exists:jeux,id',
        ]);

        $extension = Extension::create($validated);

        return redirect()
            ->route('extensions.show', $extension)
            ->with('success', 'L\'extension a été créée avec succès.');
    }

    /**
     * Affiche les détails d'une extension et ses cartes.
     */
    public function show(Extension $extension)
    {
        $extension->load(['jeu', 'cartes.cardable']);

        return view('extensions.show', compact('extension'));
    }

    /**
     * Affiche le formulaire d'édition d'une extension.
     */
    public function edit(Extension $extension)
    {
        $jeux = Jeu::orderBy('nom')->get();

        return view('extensions.edit', compact('extension', 'jeux'));
    }

    /**
     * Met à jour une extension dans la base de données.
     */
    public function update(Request $request, Extension $extension)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'code' => 'required|string|max:50',
            'nb_cartes' => 'required|integer|min:1',
            'jeu_id' => 'required|exists:jeux,id',
        ]);

        $extension->update($validated);

        return redirect()
            ->route('extensions.show', $extension)
            ->with('success', 'L\'extension a été mise à jour avec succès.');
    }

    /**
     * Supprime une extension de la base de données.
     */
    public function destroy(Extension $extension)
    {
        $extension->delete();

        return redirect()
            ->route('extensions.index')
            ->with('success', 'L\'extension a été supprimée avec succès.');
    }
}
