<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use Illuminate\Http\Request;

class FonctionnaliteController extends Controller
{
    //

    public function store(Request $request, $projetId)
    {
        // Validation
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'statut' => 'required|string|max:255',
        ]);

        // Trouver le projet par son ID
        $projet = Projet::findOrFail($projetId);

        // Créer une nouvelle fonctionnalité pour ce projet
        $projet->fonctionnalites()->create([
            'nom' => $request->nom,
            'description' => $request->description,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'statut' => $request->statut,
        ]);

        return redirect()->route('details', $projet->id);
    }
}
