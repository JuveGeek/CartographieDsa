<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PointFocalController extends Controller
{
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'user_id'               => 'required|exists:users,id',                // Vérifie qu'un utilisateur est sélectionné
            'date_debut'            => 'required|date',                           // Validation pour 'date_debut'
            'date_fin'              => 'nullable|date|after_or_equal:date_debut', // Validation pour 'date_fin'
            'structure_porteuse_id' => 'required|exists:structure_porteuses,id',  // ID de la structure porteuse
        ]);

        // Enregistrement dans la table pivot point_focal
        DB::table('point_focal')->insert([
            'structure_porteuse_id' => $request->structure_porteuse_id,
            'user_id'               => $request->user_id,
            'date_debut'            => $request->date_debut,
            'date_fin'              => $request->date_fin,

        ]);

        // Retour avec un message de succès
        return redirect()->back()->with('success', 'Point focal ajouté avec succès.');
    }

}
