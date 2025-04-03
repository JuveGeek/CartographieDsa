<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // Supprimer les caches de rôles et de permissions pour éviter les conflits
       app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

       // Permissions pour les utilisateurs (users)
       $userPermissions = [
           'view projects',            // Voir la liste des projets
           'view project details',     // Voir les détails d'un projet
           'view profile',             // Consulter son profil
           'view difficulties',        // Voir les difficultés des projets
           'view amendments',          // Voir les amendements des projets
           'view members',             // Voir les membres de l'équipe
           'view focal points',        // Voir les points focaux
       ];

       // Permissions pour les administrateurs (admins)
       $adminPermissions = [
           // Gestion des utilisateurs
           'add user', 'edit user', 'delete user', 'update user password', 'update user email',

           // Gestion des projets
           'add project', 'view all projects', 'export project',

           // Gestion des difficultés
           'add difficulty', 'edit difficulty', 'delete difficulty',

           // Gestion des propositions de solution
           'add solution', 'delete solution',

           // Gestion des amendements
           'add amendment', 'edit amendment', 'delete amendment',

           // Gestion des membres de l'équipe
           'add member', 'edit member', 'delete member',

           // Gestion des points focaux
           'add focal point', 'edit focal point', 'delete focal point',

           // Gestion des fonctionnalités et des technologies
           'add feature', 'add technology',
       ];

       // Créer les rôles
       $admin = Role::firstOrCreate(['name' => 'admin']);
       $user = Role::firstOrCreate(['name' => 'user']);

       // Créer les permissions et les attribuer aux rôles
       foreach ($adminPermissions as $permission) {
           Permission::firstOrCreate(['name' => $permission]);
           $admin->givePermissionTo($permission);
       }

       foreach ($userPermissions as $permission) {
           Permission::firstOrCreate(['name' => $permission]);
           $user->givePermissionTo($permission);
       }

       // Assigner les rôles à des utilisateurs existants (par exemple avec des emails fictifs)
       $adminUser = \App\Models\User::firstWhere('email', 'midone@left4code.com');
       if ($adminUser) {
           $adminUser->assignRole('admin');
       }

       $simpleUser = \App\Models\User::firstWhere('email', 'zgreenholt@example.com');
        if ($simpleUser) {
            $simpleUser->assignRole('user');
        }

        $this->command->info('Rôles et permissions créés avec succès !');
    }
}
