<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Amendement;
use App\Models\DifficulteAmendement;

class AmendementController extends Controller
{

    public function show($id)
    {

        $amendement = Amendement::with(['difficulteAmendements'])->findOrFail($id);

        return view('pages/list-difficulte-amendements', compact('amendement')); // Affiche la page de détails
    }

    public function store(Request $request)
    {
       /* $request->validate([
            'source' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'file' => 'nullable|file|mimes:pdf|max:2048', // Vérification pour le fichier PDF
            'statut' => 'required|string|in:en_attente,approuve,rejete', // Validation du champ statut
            'projet_id' => 'required|exists:projets,id',


        ]);*/


        // Enregistrer la difficulté dans la base de données
        $amendement              = new Amendement;
        $amendement->description = $request->input('description');
        $amendement->source = $request->input('source');
        $amendement->date        = $request->input('date');
        $amendement->statut = $request->input('statut'); // Sauvegarde du statut


        $amendement->mise_production = $request->input('mise_production');
        $amendement->priorite        = $request->input('priorite');
        $amendement->categorie       = $request->input('categorie');
        $amendement->responsable     = $request->input('responsable');

        $amendement->projet_id   = $request->input('projet_id');

        // Si un fichier est téléchargé
        if ($request->hasFile('file')) {
            // Enregistrer le fichier dans le répertoire public "difficulties"
            $filePath              = $request->file('file')->store('amendements', 'public');
            $amendement->file_path = $filePath;
        }


        $amendement->save();

        return back()->with('successAmendement', 'Amendement ajouté avec succès');

    }


    public function storeDifficulteAmendement(Request $request)
    {

        $request->validate([
            'description' => 'required|string|max:255',
            'date'        => 'required|date',
            'file'        => 'nullable|file|mimes:pdf|max:2048', // Restriction sur les fichiers PDF
                  // Vérifie que l'ID du existe
        ]);

        // Enregistrer la proposition dans la base de données
        $amendement                       = new DifficulteAmendement;
        $amendement->description          = $request->input('description');
        $amendement->date                 = $request->input('date');
        $amendement->amendement_id = $request->input('amendement_id');

        // Si un fichier est téléchargé
        if ($request->hasFile('file')) {

            $filePath               = $request->file('file')->store('propositions', 'public');
            $amendement->file_path = $filePath;
        }

        $amendement->save();

        return back()->with('successAmendement', 'Amendement ajoutée avec succès');

    }

}
