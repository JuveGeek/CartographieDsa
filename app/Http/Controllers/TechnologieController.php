<?php

namespace App\Http\Controllers;
use App\Models\Projet;
use Illuminate\Http\Request;

class TechnologieController extends Controller
{
    //

    
    public function store(Request $request, $projetId)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'role' => 'required|string|max:255',
            'version' => 'required|string|max:255',
            'statut' => 'required|string|max:255',
        ]);

          // Trouver le projet associé
          $projet = Projet::findOrFail($projetId);

          // Créer une nouvelle technologie pour ce projet
          $projet->technologies()->create([
              'nom' => $request->nom,
              'description' => $request->description,
              'role' => $request->role,
              'version' => $request->version,
              'statut' => $request->statut,
          ]);

        return redirect()->route('details', $projet->id);
    }
}
