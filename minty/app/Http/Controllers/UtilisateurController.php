<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UtilisateurController extends Controller
{
    /**
     * Affiche la liste des utilisateurs.
     */
    public function index()
    {
        $utilisateurs = Utilisateur::withCount('cartes')
            ->latest()
            ->paginate(15);

        return view('utilisateurs.index', compact('utilisateurs'));
    }

    /**
     * Affiche le formulaire de création d'un utilisateur.
     */
    public function create()
    {
        return view('utilisateurs.create');
    }

    /**
     * Enregistre un nouvel utilisateur dans la base de données.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'pseudo' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:utilisateurs,email',
            'password' => 'required|string|min:8',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $utilisateur = Utilisateur::create($validated);

        return redirect()
            ->route('utilisateurs.show', $utilisateur)
            ->with('success', 'L\'utilisateur a été créé avec succès.');
    }

    /**
     * Affiche les détails d'un utilisateur et ses cartes associées.
     */
    public function show(Utilisateur $utilisateur)
    {
        $utilisateur->load('cartes');

        return view('utilisateurs.show', compact('utilisateur'));
    }

    /**
     * Affiche le formulaire d'édition d'un utilisateur.
     */
    public function edit(Utilisateur $utilisateur)
    {
        return view('utilisateurs.edit', compact('utilisateur'));
    }

    /**
     * Met à jour les informations d'un utilisateur dans la base de données.
     */
    public function update(Request $request, Utilisateur $utilisateur)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'pseudo' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('utilisateurs', 'email')->ignore($utilisateur->id),
            ],
            'password' => 'nullable|string|min:8',
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $utilisateur->update($validated);

        return redirect()
            ->route('utilisateurs.show', $utilisateur)
            ->with('success', 'L\'utilisateur a été mis à jour avec succès.');
    }

    /**
     * Supprime un utilisateur de la base de données.
     */
    public function destroy(Utilisateur $utilisateur)
    {
        $utilisateur->delete();

        return redirect()
            ->route('utilisateurs.index')
            ->with('success', 'L\'utilisateur a été supprimé avec succès.');
    }
}
