<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use App\Models\Fonctionnalite;
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

    public function update(Request $request, $id)
{
    // Validation
    $request->validate([
        'nom' => 'required|string|max:255',
        'description' => 'required|string',
        'date_debut' => 'required|date',
        'date_fin' => 'required|date',
        'statut' => 'required|string|max:255',
    ]);

    // Trouver la fonctionnalité
    $fonctionnalite = Fonctionnalite::findOrFail($id);

    // Mettre à jour les données
    $fonctionnalite->update([
        'nom' => $request->nom,
        'description' => $request->description,
        'date_debut' => $request->date_debut,
        'date_fin' => $request->date_fin,
        'statut' => $request->statut,
    ]);

    return redirect()->back()->with('success', 'Fonctionnalité mise à jour avec succès !');
}

public function destroy($id)
{
    try {
        $fonctionnalite = Fonctionnalite::findOrFail($id);
        $fonctionnalite->delete();

        return response()->json(['success' => true, 'message' => 'Fonctionnalité supprimée avec succès!']);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'Erreur lors de la suppression!']);
    }
}

}
