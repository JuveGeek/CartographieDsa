<?php

namespace Database\Seeders;

use App\Models\DifficulteProjet;
use App\Models\Equipe;
use App\Models\Projet;
use App\Models\PropositionSolution;
use App\Models\StructurePorteuse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Création ou récupération de la structure porteuse
        $structure = StructurePorteuse::firstOrCreate(
            ['nom' => 'ANPTIC'],
            [
                'adresse' => 'anptic@gmail.com',
                'date' => now()->subDays(10),
            ]
        );

         // Insérer des projets avec l'id de la structure porteuse
        // Insérer des projets de test
        $projet = Projet::create([
            'nom' => 'Burkina Job',
            'description' => 'La plateforme centralise les informations des demandeurs d’emploi et des recruteurs, permet un suivi des candidatures, facilite la mise en relation entre les deux parties et propose des outils d’analyse pour les décideurs.',
            'statut' => 'pas_en_exploitation',
            'date_debut' => now()->subDays(10),
            'date_fin' => now()->addDays(20),
            'objectif_principal' => 'Faciliter la gestion et le suivi des demandeurs d’emploi en mettant à disposition des outils numériques pour les institutions publiques et privées.',
            'public_cible' => 'Demandeurs d’emploi, recruteurs, agences de l’emploi, ministères en charge du travail et de la formation.',
            'phase_actuelle' => 'analyse',
            'structure_porteuse_id' => $structure->id
        ]);

        echo "✅ Projets créés avec succès !\n";

        // Difficulte projet
        $difficulte1 = DifficulteProjet::create([
            'description' => "Intégration complexe avec d'autres bases de données nationales.",
            'date' => now()->addDays(20),
            'status' => 'realisee',
            'projet_id' => $projet->id
        ]);

        $difficulte2 = DifficulteProjet::create([
            'description' => "Gestion des pics de charge lors des inscriptions massives.",
            'date' => now()->addDays(20),
            'status' => 'en_cours',
            'projet_id' => $projet->id
        ]);

        $difficulte3 = DifficulteProjet::create([
            'description' => "Retard dans la transmission des spécifications des agences partenaires.",
            'date' => now()->addDays(20),
            'status' => 'realisee',
            'projet_id' => $projet->id
        ]);

        $difficulte4 = DifficulteProjet::create([
            'description' => "Insuffisance de développeurs qualifiés pour accélérer certaines phases critiques.",
            'date' => now()->addDays(20),
            'status' => 'en_cours',
            'projet_id' => $projet->id
        ]);

        $difficulte5 = DifficulteProjet::create([
            'description' => "Difficultés à former les utilisateurs finaux dans les zones éloignées.",
            'date' => now()->addDays(20),
            'status' => 'en_cours',
            'projet_id' => $projet->id
        ]);

        echo "✅ Difficultes créés avec succès !\n";

        //pROPOSITION DE SOLUTION

        PropositionSolution::create([
            'description' => "Acquisition de serveurs performants pour gérer les charges.",
            'date' => now()->addDays(20),
            'status' => 'en_cours',
            'difficulte_projet_id' => $difficulte1->id
        ]);

        PropositionSolution::create([
            'description' => "Renforcement des outils de sécurité pour protéger les données sensibles des demandeurs d’emploi.",
            'date' => now()->addDays(20),
            'status' => 'en_cours',
            'difficulte_projet_id' => $difficulte2->id
        ]);

        PropositionSolution::create([
            'description' => "Mise en place d’un comité de pilotage régulier avec les agences partenaires.",
            'date' => now()->addDays(20),
            'status' => 'en_cours',
            'difficulte_projet_id' => $difficulte3->id
        ]);

        PropositionSolution::create([
            'description' => "Développement de tutoriels en ligne et modules de formation vidéo pour les utilisateurs.",
            'date' => now()->addDays(20),
            'status' => 'en_cours',
            'difficulte_projet_id' => $difficulte5->id
        ]);

        PropositionSolution::create([
            'description' => "Recrutement de 2 développeurs supplémentaires.",
            'date' => now()->addDays(20),
            'status' => 'en_cours',
            'difficulte_projet_id' => $difficulte4->id
        ]);

        PropositionSolution::create([
            'description' => "Augmentation du budget pour accélérer l’acquisition d’équipements informatiques.",
            'date' => now()->addDays(20),
            'status' => 'en_cours',
            'difficulte_projet_id' => $difficulte2->id
        ]);

        echo "✅ Propositions solutions créés avec succès !\n";

        Equipe::create([
            'nom' => "Equipe-Job",
            'projet_id' => $projet->id
        ]);

        echo "✅ Equipe créé avec succès !\n";

    }


    //Amendements


    //Difficultes
}
