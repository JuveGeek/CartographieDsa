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
    
}
