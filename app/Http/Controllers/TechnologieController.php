<?php

namespace App\Http\Controllers;
use App\Models\Projet;
use App\Models\Technologie;
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


    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'role' => 'required|string|max:255',
            'version' => 'required|string|max:255',
            'statut' => 'required|string|max:255',
        ]);
    
        // Trouver et mettre à jour la technologie
        $technologie = Technologie::findOrFail($id);
        $technologie->update([
            'nom' => $request->nom,
            'description' => $request->description,
            'role' => $request->role,
            'version' => $request->version,
            'statut' => $request->statut,
        ]);
    
        return redirect()->route('details', $technologie->projet_id)->with('success', 'Technologie mise à jour !');
    }
    
    public function destroy($id)
{
    $technologie = Technologie::findOrFail($id);

    if ($technologie) {
        $technologie->delete();
        return response()->json(['success' => true]);
    } else {
        return response()->json(['success' => false, 'message' => 'Technologie non trouvée']);
    }
}




}
