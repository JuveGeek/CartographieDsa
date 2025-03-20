<?php
namespace App\Http\Controllers;

use App\Models\Membre_equipe;
use Illuminate\Http\Request;

class MembreEquipeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'users'      => 'required|array',
            'users.*'    => 'exists:users,id',
            'role'       => 'required|string',
            'statut'     => 'required|string',
            'date_debut' => 'required|date',
            'date_fin'   => 'nullable|date|after_or_equal:date_debut',
        ]);

        foreach ($request->users as $user_id) {
            Membre_equipe::create([
                'user_id'    => $user_id,
                'role'       => $request->role,
                'statut'     => $request->statut,
                'actif'      => (int) $request->actif, // Convertir en booléen
                'date_debut' => $request->date_debut,
                'date_fin'   => $request->date_fin,
                'equipe_id'  => $request->equipe_id,
            ]);
        }

        return redirect()->back()->with('successMembre', 'Membre(s) ajouté(s) avec succès.');
    }

    public function update(Request $request)
    {

        // Récupérer le memnre par ID
        $membre = Membre_equipe::findOrFail($request->id);

        // Mise à jour
        $membre->update([
            'user_id'    => $request->user_id,
            'role'       => $request->role,
            'statut'     => $request->statut,
            'actif'      => (int) $request->actif, // Convertir en booléen
            'date_debut' => $request->date_debut,
            'date_fin'   => $request->date_fin,
            'equipe_id'  => $request->equipe_id,
        ]);

        // Rediriger avec un message de succès
        return back()->with('success', 'Membre mis à jour avec succès.');
    }

    public function destroy(Request $request)
    {
        $membreId = $request->input('membre_id'); // Récupérer l'ID envoyé dans l'AJAX
        $membre   = Membre_equipe::findOrFail($membreId);
        $membre->delete();

        return response()->json(['message' => 'Membre supprimé avec succès']);
    }
}
