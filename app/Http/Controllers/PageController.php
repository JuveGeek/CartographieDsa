<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Equipe;
use App\Models\Projet;
use App\Models\StructurePorteuse;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

use App\Exports\ProjetMultiSheetExport;
use Maatwebsite\Excel\Facades\Excel;

class PageController extends Controller
{

    public function exportProjet($id)
    {
        $projet = Projet::findOrFail($id);
        return Excel::download(new ProjetMultiSheetExport($id), 'projet_' . $projet->nom . '.xlsx');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dashboardOverview1()
    {
        return view('pages/dashboard-overview-1', );
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dashboardOverview2()
    {
        return view('pages/dashboard-overview-2');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dashboardOverview3()
    {
        return view('pages/dashboard-overview-3');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function details($id)
    {
        $users = User::all();
        $unProjet = Projet::find($id);

        $projet = Projet::with(['equipe.users', 'structurePorteuse.pointsFocaux', 'fonctionnalites', 'technologies', 'difficulteProjets', 'amendements'])->findOrFail($id);

        if ($projet->equipe) {
            $membres = $projet->equipe->users()->withPivot('statut', 'role', 'actif', 'date_debut', 'date_fin')->get();
        } else {
            $membres = collect(); // Retourne une collection vide si pas d'équipe
        }

        $focaux = Projet::with('structurePorteuse.pointsFocaux')->findOrFail($id);


        // Récupérer la structure bénéficiaire par son ID avec ses projets associés

        $projet = Projet::with('structuresBeneficiaires')->findOrFail($id);

        return view('pages/details', compact('projet', 'users', 'membres','unProjet', 'focaux'));

    }


    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function usersLayoutMembre()
    {
        $users = User::paginate(10); // Récupérer les utilisateurs et les paginer par 10

        $roles = Role::all(); // Récupérer tous les rôles
                              //$userRoles = $user->getRoleNames(); // Récupérer les rôles de l'utilisateur

        //return view('pages/profile-overview-3', compact('user','roles', 'userRoles'));

        return view('pages/users-layout-membre', compact('users', 'roles'));

    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function profileOverview1()
    {

        return view('pages/profile-overview-1');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function profileOverview2()
    {
        return view('pages/profile-overview-2');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function profileOverview3()
    {

        // Récupère l'utilisateur par son ID
        if (auth()->check()) {
            $userId = auth()->user()->id;
            $user   = User::findOrFail($userId);
        }

        $roles     = Role::all();           // Récupérer tous les rôles
        $userRoles = $user->getRoleNames(); // Récupérer les rôles de l'utilisateur

        return view('pages/profile-overview-3', compact('user', 'roles', 'userRoles'));

    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function amendements()
    {
        return view('pages/amendements');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function difficultes()
    {
        return view('pages/difficultes');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('pages/login');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('pages/register');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateProfile()
    {
        return view('pages/update-profile');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function changePassword()
    {
        return view('pages/change-password');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function projetsForm()
    {
        return view('pages/projets-form');

    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function projetsDataList()
    {
        $projets = Projet::with('StructurePorteuse')->get();

        return view('pages/projets-data-list');
    }
// Méthode pour enregistrer un Projet

    /**
     * .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeProjet(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'nom'                   => 'required|string|max:255',
            'description'           => 'required|string|max:255',
            'date_debut'            => 'required|date',
            'date_fin'              => 'required|date',
            'statut'                => 'required|string|in:en_exploitation,pas_en_exploitation',
            'structure_porteuse_id' => 'required|exists:structure_porteuses,id', // Vérifie si l'ID existe
            'objectif_principal'    => 'required|string|max:255',
            'public_cible'          => 'required|string|max:255',
            'phase_actuelle'        => 'required|string|max:255',

        ]);

        // Vérification de l'existence d'un enregistrement avec les mêmes données
        $existingProjet = Projet::where('nom', $validated['nom'])
            ->where('description', $validated['description'])
            ->where('date_debut', $validated['date_debut'])
            ->where('date_fin', $validated['date_fin'])
            ->where('statut', $validated['statut'])
            ->where('structure_porteuse_id', $validated['structure_porteuse_id'])
            ->where('objectif_principal', $validated['objectif_principal'])
            ->where('public_cible', $validated['public_cible'])
            ->where('phase_actuelle', $validated['phase_actuelle'])
            ->first();

        // Enregistrement dans la base de données si aucune correspondance n'a été trouvée
        $projet = Projet::create([
            'nom'                   => $validated['nom'],
            'description'           => $validated['description'],
            'date_debut'            => $validated['date_debut'],
            'date_fin'              => $validated['date_fin'],
            'statut'                => $validated['statut'],
            'structure_porteuse_id' => $validated['structure_porteuse_id'],
            'objectif_principal'    => $validated['objectif_principal'],
            'public_cible'          => $validated['public_cible'],
            'phase_actuelle'        => $validated['phase_actuelle'],
        ]);

        // Génération du nom de l'équipe en fonction du nom du projet
        $nomEquipe = 'Equipe-' . strtoupper(str_replace(' ', '_', $projet->nom));

        // Création de l'équipe liée au projet
        $equipe = Equipe::create([
            'nom'       => $nomEquipe,
            'projet_id' => $projet->id,
        ]);
        return redirect('/projets-data-list-page')->with('success', 'projet ajouté avec succès!');
    }

    public function showprojetsDataList()
    {
        // Récupérer toutes les projets depuis la base de données
        $projets = Projet::all();

        // Passer les données à la vue
        return view('pages/projets-data-list', compact('projets'));

    }

    // Méthode pour enregistrer un Structre porteuse

    /**
     * .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function storeStructureporteuse(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'nom'     => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'date'    => 'required|date',
        ]);

        // Vérification de l'existence d'un enregistrement avec les mêmes données
        $existingStructurePorteuse = StructurePorteuse::where('nom', $validated['nom'])
            ->where('adresse', $validated['adresse'])
            ->where('date', $validated['date'])
            ->first();

        if ($existingStructurePorteuse) {
            return response()->json(['status' => 'error', 'message' => 'Cette structure porteuse existe déjà.'], 400);
        }

        // Enregistrement dans la base de données
        $structurePorteuse = StructurePorteuse::create([
            'nom'     => $validated['nom'],
            'adresse' => $validated['adresse'],
            'date'    => $validated['date'],
        ]);

        // Retourner une réponse JSON
        return response()->json([
            'status'    => 'success',
            'message'   => 'Structure porteuse ajoutée avec succès !',
            'structure' => $structurePorteuse,
        ]);
    }

//Equipe

    public function storeEquipe(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'nom'        => 'required|string|max:255',
            'date_debut' => 'required|string|max:255',
            'date_fin'   => 'required|date',
        ]);

        // Vérification de l'existence d'un enregistrement avec les mêmes données
        $existingEquipe = Equipe::where('nom', $validated['nom'])
            ->where('date_debut', $validated['date_debut'])
            ->where('date_fin', $validated['date_fin'])
            ->first();

        if ($existingEquipe) {
            return response()->json(['status' => 'error', 'message' => 'L\'équipe existe déjà.'], 400);
        }

        // Enregistrement de l'équipe dans la base de données
        $equipe = Equipe::create([
            'nom'        => $validated['nom'],
            'date_debut' => $validated['date_debut'],
            'date_fin'   => $validated['date_fin'],
        ]);

        // Récupérer toutes les équipes après enregistrement
        $equipes = Equipe::all();

        // Retourner une réponse JSON avec les équipes mises à jour
        return response()->json([
            'status'  => 'success',
            'message' => 'L\'équipe a été enregistrée avec succès !',
            'equipe'  => $equipe,  // Retourne l'équipe nouvellement créée
            'equipes' => $equipes, // Retourne toutes les équipes mises à jour
        ]);
    }

    public function showprojetsForm()
    {
        // Récupérer toutes les structures porteuses depuis la base de données
        $structures = StructurePorteuse::all();
        // Récupérer toutes les equipes depuis la base de données
        $equipes = Equipe::all();
        // Passer les données à la vue
        return view('pages/projets-form', compact('structures', 'equipes'));

    }
    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function usersForm()
    {
        return view('pages/users-form');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function amendementsForm()
    {
        return view('pages/amendements-form');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function difficultesForm()
    {
        return view('pages/difficultes-form');
    }

}
