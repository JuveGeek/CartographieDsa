<?php

namespace App\Http\Controllers;
use App\Models\Projet;
use App\Models\StructureBeneficiaire;
use Illuminate\Http\Request;

class StructureBeneficiaireController extends Controller
{
    //
    public function store(Request $request, $projetId)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'statut' => 'required|string|max:255',
            'etat' => 'required|string|max:255',
            'annee_deploiement' => 'nullable|date',
            'annee_exploitation' => 'nullable|date',
            'commentaire' => 'nullable|string',
            
        ]);
    
        
        // Récupérer le projet auquel on va associer la StructureBeneficiaire
        $projet = Projet::findOrFail($projetId);

        // Création de la StructureBeneficiaire
        $structureBeneficiaire = StructureBeneficiaire::create($validatedData);

        // Associer la StructureBeneficiaire au Projet avec un commentaire dans la table pivot
        $structureBeneficiaire->projets()->attach($projet->id);
        
        return redirect()->route('details', $projet->id);

    }
    
    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'nom' => 'required|string|max:255',
        'statut' => 'required|string|max:255',
        'etat' => 'required|string|max:255',
        'annee_deploiement' => 'nullable|date',
        'annee_exploitation' => 'nullable|date',
        'commentaire' => 'nullable|string',
    ]);

    // Trouver la structure à modifier
    $structureBeneficiaire = StructureBeneficiaire::findOrFail($id);

    // Mise à jour des données
    $structureBeneficiaire->update($validatedData);

    return redirect()->route('details', $structureBeneficiaire->projets->first()->id)
                     ->with('success', 'Structure bénéficiaire mise à jour avec succès');
}


public function destroy($id)
{
    $structureBeneficiaire = StructureBeneficiaire::findOrFail($id);

    // Supprimer l'association avec le projet avant suppression
    $structureBeneficiaire->projets()->detach();

    // Supprimer la structure bénéficiaire
    $structureBeneficiaire->delete();

    return response()->json(['success' => true]);
}

}
