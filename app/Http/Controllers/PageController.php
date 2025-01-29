<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Equipe;
use App\Models\Projet;
use App\Models\StructurePorteuse;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class PageController extends Controller
{
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
    public function dashboardOverview4()
    {
        return view('pages/dashboard-overview-4');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function inbox()
    {
        return view('pages/inbox');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function categories()
    {
        return view('pages/categories');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addProduct()
    {
        return view('pages/add-product');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function productList()
    {
        return view('pages/product-list');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function productGrid()
    {
        return view('pages/product-grid');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function transactionList()
    {
        return view('pages/transaction-list');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function transactionDetail()
    {
        return view('pages/transaction-detail');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sellerList()
    {
        return view('pages/seller-list');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sellerDetail()
    {
        return view('pages/seller-detail');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function details($id)
    {
        $projet = Projet::with(['fonctionnalites', 'technologies', 'difficulteProjets', 'amendements'])->findOrFail($id);

        return view('pages/details', compact('projet'));
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function fileManager()
    {
        return view('pages/file-manager');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pointOfSale()
    {
        return view('pages/point-of-sale');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function chat()
    {
        return view('pages/chat');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function post()
    {
        return view('pages/post');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function calendar()
    {
        return view('pages/calendar');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function projetsFichier()
    {
        return view('pages/projets-fichier');
    }

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
    public function usersLayoutSuivis()
    {
        return view('pages/users-layout-suivis');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function usersLayoutPointFocal()
    {
        return view('pages/users-layout-point-focal');
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
    public function wizardLayout1()
    {
        return view('pages/wizard-layout-1');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function wizardLayout2()
    {
        return view('pages/wizard-layout-2');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function wizardLayout3()
    {
        return view('pages/wizard-layout-3');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function blogLayout1()
    {
        return view('pages/blog-layout-1');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function blogLayout2()
    {
        return view('pages/blog-layout-2');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function blogLayout3()
    {
        return view('pages/blog-layout-3');
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
    public function invoiceLayout1()
    {
        return view('pages/invoice-layout-1');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function invoiceLayout2()
    {
        return view('pages/invoice-layout-2');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function faqLayout1()
    {
        return view('pages/faq-layout-1');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function faqLayout2()
    {
        return view('pages/faq-layout-2');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function faqLayout3()
    {
        return view('pages/faq-layout-3');
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
    public function errorPage()
    {
        return view('pages/error-page');
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
    public function regularTable()
    {
        return view('pages/regular-table');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tabulator()
    {
        return view('pages/tabulator');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function modal()
    {
        return view('pages/modal');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function slideOver()
    {
        return view('pages/slide-over');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function notification()
    {
        return view('pages/notification');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tab()
    {
        return view('pages/tab');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function accordion()
    {
        return view('pages/accordion');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function button()
    {
        return view('pages/button');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function alert()
    {
        return view('pages/alert');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function progressBar()
    {
        return view('pages/progress-bar');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tooltip()
    {
        return view('pages/tooltip');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dropdown()
    {
        return view('pages/dropdown');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function typography()
    {
        return view('pages/typography');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function icon()
    {
        return view('pages/icon');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function loadingIcon()
    {
        return view('pages/loading-icon');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function regularForm()
    {
        return view('pages/regular-form');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function datepicker()
    {
        return view('pages/datepicker');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tomSelect()
    {
        return view('pages/tom-select');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function fileUpload()
    {
        return view('pages/file-upload');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function wysiwygEditorClassic()
    {
        return view('pages/wysiwyg-editor-classic');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function wysiwygEditorInline()
    {
        return view('pages/wysiwyg-editor-inline');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function wysiwygEditorBalloon()
    {
        return view('pages/wysiwyg-editor-balloon');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function wysiwygEditorBalloonBlock()
    {
        return view('pages/wysiwyg-editor-balloon-block');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function wysiwygEditorDocument()
    {
        return view('pages/wysiwyg-editor-document');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function validation()
    {
        return view('pages/validation');
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
      'nom' => $nomEquipe,
      'projet_id' => $projet->id
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
             'nom' => 'required|string|max:255',
             'adresse' => 'required|string|max:255',
             'date' => 'required|date',
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
             'nom' => $validated['nom'],
             'adresse' => $validated['adresse'],
             'date' => $validated['date'],
         ]);

         // Retourner une réponse JSON
         return response()->json([
             'status' => 'success',
             'message' => 'Structure porteuse ajoutée avec succès !',
             'structure' => $structurePorteuse
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
        'status' => 'success',
        'message' => 'L\'équipe a été enregistrée avec succès !',
        'equipe' => $equipe, // Retourne l'équipe nouvellement créée
        'equipes' => $equipes // Retourne toutes les équipes mises à jour
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

    public function instancesForm()
    {
        return view('pages/instances-form');
    }

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

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function chart()
    {
        return view('pages/chart');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function slider()
    {
        return view('pages/slider');
    }

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function imageZoom()
    {
        return view('pages/image-zoom');
    }
}
