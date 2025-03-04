<?php

namespace App\Exports;

use App\Models\Projet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class StructureBeneficiaireSheetExport implements FromCollection, WithHeadings, WithTitle, WithStyles, WithColumnWidths
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

    public function styles(Worksheet $sheet)
    {
        return [
            'B' => ['alignment' => ['wrapText' => true]],
            'G' => ['alignment' => ['wrapText' => true]],
        ];
    }

    // Ajuste la largeur des colonnes
    public function columnWidths(): array
    {
        return [
            'A' => 10,  // ID
            'B' => 30,  // Nom
            'C' => 20,
            'D' => 15,
            'E' => 15,
            'F' => 15,
            'G' => 40,

        ];
    }

    public function title(): string
    {
        return 'Structures beneficiaires'; // Nom fixe
    }
}
