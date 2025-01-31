<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
// Importer la classe Role

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Création des rôles avec Spatie
        $roles = ['admin', 'user'];

        // Vérifie et crée les rôles
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role, 'guard_name' => 'web']);
        }

        echo "✅ Rôles créés avec succès !\n";

        // Création de l'utilisateur Left4code
        $admin = User::firstOrCreate([
            'email' => 'midone@left4code.com',
        ], [
            'name'              => 'Left4code',
            'firstname'         => 'Juve',
            'email_verified_at' => now(),
            'password'          => bcrypt('password'), // Assurer que le mot de passe est sécurisé
            'tel'               => '123456789',
            'structure'         => 'ANPTIC',
            'remember_token'    => Str::random(10),
        ]);

        // Assigner le rôle "admin" à Left4code
        $admin->assignRole('admin');
        echo "✅ Utilisateur Left4code créé et rôle 'admin' assigné !\n";

        // Générer 9 utilisateurs avec la factory
        $users = User::factory()->count(9)->create();

        // Assigner le rôle "user" à chaque utilisateur généré
        foreach ($users as $user) {
            $user->assignRole('user');
        }

        echo "✅ Rôles 'user' assignés aux utilisateurs créés par la factory !\n";
    }
}
