<?php

namespace App\Exports;

use App\Models\Projet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class FonctionnaliteSheetExport implements FromCollection, WithHeadings, WithTitle, WithStyles, WithColumnWidths
{
    protected $projetId;

    public function __construct($projetId)
    {
        $this->projetId = $projetId;
    }
    public function collection()
    {

        return Projet::findOrFail($this->projetId)
            ->fonctionnalites()
            ->select('fonctionnalites.id', 'fonctionnalites.nom', 'fonctionnalites.description', 'fonctionnalites.date_debut',  'fonctionnalites.date_fin', 'fonctionnalites.statut')
            ->get();


    }

    public function headings(): array
    {
        return ['ID', 'Nom', 'Description', 'Date de début', 'Date de fin', 'Statut'];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            'C' => ['alignment' => ['wrapText' => true]],

        ];
    }

    // Ajuste la largeur des colonnes
    public function columnWidths(): array
    {
        return [
            'A' => 10,  // ID
            'B' => 20,  // Nom
            'C' => 50,  // Description (large pour le texte long)
            'D' => 15,  // Date de création
            'E' => 15,
            'F' => 15,

        ];
    }

    public function title(): string
    {
        return 'Fonctionnalites'; // Nom fixe
    }
}
