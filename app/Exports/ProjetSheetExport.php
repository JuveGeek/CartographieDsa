<?php

namespace App\Exports;

use App\Models\Projet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ProjetSheetExport implements FromCollection, WithHeadings, WithTitle, WithStyles, WithColumnWidths
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $projetId;
    protected $projet;



    public function __construct($projetId)
    {
        $this->projetId = $projetId;
    }
    public function collection()
    {
        /*return Projet::with(['equipe.users', 'structurePorteuse.pointsFocaux', 'fonctionnalites', 'technologies',
        'difficulteProjets', 'amendements', 'structuresBeneficiaires'])->get();*/


        return Projet::where('id', $this->projetId)
            ->select('id', 'nom', 'description', 'date_debut', 'date_fin', 'statut', 'created_at', 'updated_at',
            'objectif_principal', 'public_cible', 'phase_actuelle')
            ->get();
    }



    public function headings(): array
    {
        return ['ID', 'Nom', 'Description', 'Date de début', 'Date de fin', 'statut', 'Date de création', 'Date de mise à jour',
         'Objectif principal', 'Public cible', 'Phase actuelle'];
    }

    // Active le retour à la ligne dans la colonne "Description"
    public function styles(Worksheet $sheet)
    {
        return [
            'C' => ['alignment' => ['wrapText' => true]],
            'I' => ['alignment' => ['wrapText' => true]],
            'J' => ['alignment' => ['wrapText' => true]],

        ];
    }

    // Ajuste la largeur des colonnes
    public function columnWidths(): array
    {
        return [
            'A' => 10,  // ID
            'B' => 20,  // Nom
            'C' => 50,  // Description (large pour le texte long)
            'D' => 10,  // Date de création
            'E' => 10,
            'F' => 15,
            'G' => 10,
            'H' => 10,
            'I' => 50,
            'J' => 50,
        ];
    }

    public function title(): string
    {
        $this->projet = Projet::findOrFail($this->projetId);
        // Nettoyage du nom pour éviter les erreurs Excel
        return substr(preg_replace('/[^A-Za-z0-9]/', '_', $this->projet->nom), 0, 31);
    }

}
namespace App\Exports;
