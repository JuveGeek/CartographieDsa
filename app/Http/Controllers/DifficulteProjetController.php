<?php
namespace App\Http\Controllers;

use App\Models\DifficulteProjet;
use App\Models\PropositionSolution;
use Illuminate\Http\Request;

class DifficulteProjetController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'date'        => 'required|date',
            'file'        => 'nullable|file|mimes:pdf|max:2048', // Restriction sur les fichiers PDF
            'projet_id'   => 'required|exists:projets,id',       // Vérifie que l'ID du projet existe
        ]);

        // Enregistrer la difficulté dans la base de données
        $difficulte              = new DifficulteProjet;
        $difficulte->description = $request->input('description');
        $difficulte->date        = $request->input('date');
        $difficulte->projet_id   = $request->input('projet_id');

        // Si un fichier est téléchargé
        if ($request->hasFile('file')) {
            // Enregistrer le fichier dans le répertoire public "difficulties"
            $filePath              = $request->file('file')->store('difficulties', 'public');
            $difficulte->file_path = $filePath;
        }

        $difficulte->save();

        return back()->with('successDiffProj', 'Difficulté ajoutée avec succès');

    }

    public function show($id)
    {

        $difficulteProjet = DifficulteProjet::with(['propositionSolutions'])->findOrFail($id);

        return view('pages/list-proposition-solutions', compact('difficulteProjet')); // Affiche la page de détails
    }

    public function storeProposition(Request $request)
    {

        $request->validate([
            'description' => 'required|string|max:255',
            'date'        => 'required|date',
            'file'        => 'nullable|file|mimes:pdf|max:2048', // Restriction sur les fichiers PDF
                  // Vérifie que l'ID du existe
        ]);

        // Enregistrer la proposition dans la base de données
        $proposition                       = new PropositionSolution;
        $proposition->description          = $request->input('description');
        $proposition->date                 = $request->input('date');
        $proposition->difficulte_projet_id = $request->input('difficulte_projet_id');

        // Si un fichier est téléchargé
        if ($request->hasFile('file')) {

            $filePath               = $request->file('file')->store('propositions', 'public');
            $proposition->file_path = $filePath;
        }

        $proposition->save();

        return back()->with('successProposition', 'Difficulté ajoutée avec succès');

    }

}
