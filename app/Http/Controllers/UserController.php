<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    // Liste des utilisateurs paginés

    public function index()
    {
        $users = User::paginate(10); // Récupérer les utilisateurs et les paginer par 10
        return view('users-layout-membre', compact('users'));
    }

    public function store(Request $request)
    {

        /*$request->validate([
            'name'      => 'required|string|min:2|max:255',
            'firstname' => 'required|string|min:2|max:255',
            'email'     => ['required', 'email', 'max:255', Rule::unique('users')],
            'password'  => 'required|min:6',
            'tel'       => 'required|digits:8',
            //'role' => 'required|exists:roles,name',
        ]);*/

        $user = User::create([
            'name'      => $request->name,
            'firstname' => $request->firstname,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'tel'       => $request->tel,
        ]);

        //$user->save();

        $user->assignRole($request->role);

        // Message flash de succès
        session()->flash('success', 'Utilisateur ajouté avec succès !');

        // Redirection
        return redirect()->route('users-layout-membre');

        /*
<div class="flex flex-col sm:flex-row mt-2">
                                @foreach($roles as $role)
                                    <div class="form-check mr-2">
                                        <input id="role-{{ $role->id }}" class="form-check-input" type="radio" name="role" value="{{ $role->name }}">
                                        <label class="form-check-label" for="role-{{ $role->id }}">{{ $role->name }}</label>
                                    </div>
                                @endforeach
                            </div>
    */
    }

    public function show($id)
    {
        $user = User::findOrFail($id); // Récupère l'utilisateur par son ID

        $roles = Role::all(); // Récupérer tous les rôles
                              //$userRoles = $user->getRoleNames(); // Récupérer les rôles de l'utilisateur

        //return view('pages/profile-overview-3', compact('user','roles', 'userRoles'));

        return view('pages/profile-overview-1', compact('user', 'roles')); // Affiche la page de détails
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::id());

        // Validation des données
        $request->validate([
            'name'      => 'required|string|max:255',
            'firstname' => 'nullable|string|max:255',
            'tel'       => 'nullable|string|max:20',
            'role'      => 'required|exists:roles,name', // Validation du rôle
        ]);

        // Mise à jour de l'utilisateur
        $user->update([
            'name'      => $request->name,
            'structure'      => $request->structure,
            'firstname' => $request->firstname,
            'tel'       => $request->tel,
        ]);

                                            // Mise à jour du rôle de l'utilisateur
        $user->syncRoles([$request->role]); // Utilisation de syncRoles pour gérer les rôles

        return back()->with('success', 'Profil mis à jour avec succès.');
    }

    public function updateUser(Request $request)
    {
        $user = User::findOrFail($request->id);

        // Validation des données
        /*$request->validate([
            'name'      => 'required|string|max:255',
            'firstname' => 'nullable|string|max:255',
            'tel'       => 'nullable|string|max:20',
            'email'     => 'required|string|max:20',
            'role' => 'nullable|string|exists:roles,name', //  le rôle existe
        ]);
*/
        // Mise à jour de l'utilisateur
        $user->update([
            'name'      => $request->name,
            'structure'      => $request->structure,
            'firstname' => $request->firstname,
            'tel'       => $request->tel,
            'email'     => $request->email,
        ]);

        // Mise à jour du rôle de l'utilisateur
        // Utilisation de syncRoles pour gérer les rôles

        $user->syncRoles($request->role); // Modifier le rôle existant

        return back()->with('success', 'Profil mis à jour avec succès.');
    }

    public function destroy(Request $request)
    {
        $userId = $request->input('user_id'); // Récupérer l'ID envoyé dans l'AJAX
        $user   = User::findOrFail($userId);
        $user->delete();

        return response()->json(['message' => 'Utilisateur supprimé avec succès']);
    }

    public function updatePassword(Request $request)
    {
        // Validation des champs
        $request->validate([
            'current_password' => ['required'],
            'new_password'     => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::find(Auth::id());

        // Vérifier si l'ancien mot de passe est correct
        if (! Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'L\'ancien mot de passe est incorrect.']);
        }

        // Mettre à jour le mot de passe
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        session()->flash('successPassword', 'Votre mot de passe a été mis à jour avec succès.');

        // Redirection
        Auth::logout();
        return redirect('login');
    }

    public function updateEmail(Request $request)
    {
        $user = User::find(Auth::id());

        // Vérifier si l'email est le même que l'actuel
        if ($request->email === $user->email) {
            return back()->with('errorEmail', 'Vous avez entré le même email.');
        }

        $request->validate([
            'email' => ['required', 'email', 'unique:users,email,' . auth()->id()],
        ], [
            'email.required' => 'L\'email est obligatoire.',
            'email.email'    => 'Veuillez entrer une adresse email valide.',
            'email.unique'   => 'Cet email est déjà utilisé, veuillez en choisir un autre.',
        ]);

        $user->email = $request->email;
        $user->save();

        return back()->with('successEmail', 'Email mis à jour avec succès.');
    }

}
