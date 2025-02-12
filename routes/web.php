<?php

use App\Http\Controllers\AmendementController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ColorSchemeController;
use App\Http\Controllers\DarkModeController;
use App\Http\Controllers\DifficulteProjetController;
use App\Http\Controllers\FonctionnaliteController;
use App\Http\Controllers\StructureBeneficiaireController;
use App\Http\Controllers\MembreEquipeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TechnologieController;
use App\Http\Controllers\PointFocalController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('dark-mode-switcher', [DarkModeController::class, 'switch'])->name('dark-mode-switcher');
Route::get('color-scheme-switcher/{color_scheme}', [ColorSchemeController::class, 'switch'])->name('color-scheme-switcher');

// Routes pour les utilisateurs authentifiés
Route::middleware('auth')->group(function () {
    // Pages accessibles uniquement aux utilisateurs authentifiés
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::controller(PageController::class)->group(function () {
        Route::get('/', 'dashboardOverview1')->name('dashboard-overview-1');
        Route::get('projets-form-page', 'projetsForm')->name('projets-form');
        Route::get('projets-data-list-page', 'projetsDataList')->name('projets-data-list');
        Route::get('dashboard-overview-2-page', 'dashboardOverview2')->name('dashboard-overview-2');
        Route::get('dashboard-overview-3-page', 'dashboardOverview3')->name('dashboard-overview-3');

        Route::get('details-page/{id}', 'details')->name('details');

        Route::get('/projets-data-list-page', 'showprojetsDataList')->name('projets-data-list');

        Route::post('/projet', 'storeProjet')->name('projet.storeProjet');
        Route::post('/equipe', 'storeEquipe')->name('equipe.storeEquipe');
        Route::post('/structure-porteuse', 'storeStructureporteuse')->name('structure-porteuse.storeStructureporteuse');
        Route::get('/projets-form-page', 'showprojetsForm');
        Route::get('users-form-page', 'usersForm')->name('users-form');
        Route::get('amendements-form-page', 'amendementsForm')->name('amendements-form');
        Route::get('difficultes-form-page', 'difficultesForm')->name('difficultes-form');
        Route::get('instances-form-page', 'instancesForm')->name('instances-form');
        Route::get('users-layout-membre-page', 'usersLayoutMembre')->name('users-layout-membre');
        Route::get('profile-overview-1-page', 'profileOverview1')->name('profile-overview-1');
        Route::get('profile-overview-2-page', 'profileOverview2')->name('profile-overview-2');
        Route::get('profile-overview-3-page', 'profileOverview3')->name('profile-overview-3');

        Route::get('amendements-page', 'amendements')->name('amendements');
        Route::get('difficultes-page', 'difficultes')->name('difficultes');

        //Route::get('login-page', 'login')->name('login');
        //Route::get('register-page', 'register')->name('register');
        Route::get('update-profile-page', 'updateProfile')->name('update-profile');
        Route::get('change-password-page', 'changePassword')->name('change-password');

        // Ajoute les autres routes ici selon le besoin
        Route::post('/admin/users', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
        Route::put('/user/update', [UserController::class, 'update'])->name('users.update');
        Route::put('/user/updateUser', [UserController::class, 'updateUser'])->name('users.updateUser');
        Route::put('/users/update-password', [UserController::class, 'updatePassword'])->name('users.update-password');
        Route::put('/users/update-email', [UserController::class, 'updateEmail'])->name('users.update.email');

        Route::delete('/user/delete', [UserController::class, 'destroy'])->name('users.delete');

        Route::post('/projets/{projet}/fonctionnalites', [FonctionnaliteController::class, 'store'])->name('fonctionnalites.store');
        Route::post('/projets/{projet}/structure-beneficiaire', [StructureBeneficiaireController::class, 'store'])->name('structure-beneficiaire.store');

        Route::post('/projets/{projet}/technologies', [TechnologieController::class, 'store'])->name('technologies.store');
        Route::post('/difficultes', [DifficulteProjetController::class, 'store'])->name('difficultes.store');
        Route::get('/difficultes/{id}/proposition-solutions', [DifficulteProjetController::class, 'show'])->name('difficultes.show');
        Route::post('/proposition-solution', [DifficulteProjetController::class, 'storeProposition'])->name('difficultes.storeProposition');

        Route::post('/amendements', [AmendementController::class, 'store'])->name('amendements.store');
        Route::get('/amendements/{id}/difficulte-amendements', [AmendementController::class, 'show'])->name('amendements.show');
        Route::post('/difficulte-amendement', [AmendementController::class, 'storeDifficulteAmendement'])->name('amendements.storeDifficulteAmendement');

        Route::post('/membre-equipe', [MembreEquipeController::class, 'store'])->name('membre_equipe.store');
        Route::post('/point-focal', [PointFocalController::class, 'store'])->name('point_focal.store');

        Route::get('/export-projet/{id}', [PageController::class, 'exportProjet'])->name('export.projet');

    });
});

// Routes pour les utilisateurs non connectés (invités)
Route::middleware('guest')->group(function () {
    // Pages accessibles uniquement aux utilisateurs non connectés
    Route::get('login', [AuthController::class, 'loginView'])->name('login.index');
    Route::post('login', [AuthController::class, 'login'])->name('login.check');
    // Page d'inscription, si nécessaire
    //Route::get('register-page', [PageController::class, 'register'])->name('register');
    //Route::post('register', [AuthController::class, 'register'])->name('register.store');

});
