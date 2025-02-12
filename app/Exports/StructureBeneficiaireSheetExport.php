<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Projet;
use Maatwebsite\Excel\Concerns\WithTitle;

class StructureBeneficiaireSheetExport implements FromCollection, WithHeadings, WithTitle
{
    protected $projetId;

    public function __construct($projetId)
    {
        $this->projetId = $projetId;
    }
    public function collection()
    {

        $projet = Projet::with('structuresBeneficiaires') // Charger les structures bénéficiaires associées
            ->findOrFail($this->projetId);

        // Récupérer les structures bénéficiaires
        return $projet->structuresBeneficiaires->map(function ($structure) {
            return [
                'id' => $structure->id,
                'nom' => $structure->nom, // Nom de la structure
                'statut' => $structure->statut, // Statut de la structure
                'etat' => $structure->etat, // Etat de la structure
                'annee_deploiement' => $structure->annee_deploiement, // Année de déploiement
                'annee_exploitation' => $structure->annee_exploitation, // Année d'exploitation
                'commentaire' => $structure->commentaire, // Commentaires
            ];
        });

    }

    public function headings(): array
    {
        return ['ID', 'Nom', 'Statut', 'Etat', 'Année déploiement', 'Année exploitation', 'Commentaires'];
    }

    public function title(): string
    {
        return 'Structures beneficiaires'; // Nom fixe
    }
}
