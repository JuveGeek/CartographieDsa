<?php

namespace App\Exports;

use App\Models\Projet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AmendementSheetExport implements FromCollection, WithHeadings, WithTitle, WithStyles, WithColumnWidths
{
    protected $projetId;

    public function __construct($projetId)
    {
        $this->projetId = $projetId;
    }
    public function collection()
    {

        return Projet::findOrFail($this->projetId)
            ->amendements()
            ->select('amendements.id', 'amendements.description', 'amendements.source',  'amendements.responsable', 'amendements.statut',
            'amendements.date', 'amendements.categorie', 'amendements.mise_production', 'amendements.priorite',)
            ->get();


    }

    public function headings(): array
    {
        return ['ID', 'Description', 'Source', 'Responsable amendement', 'Statut', 'Date', 'Catégorie', 'Mise en production', 'Niveau de priorité'];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            'B' => ['alignment' => ['wrapText' => true]],
            'C' => ['alignment' => ['wrapText' => true]],
            'D' => ['alignment' => ['wrapText' => true]],
            'G' => ['alignment' => ['wrapText' => true]],
            'H' => ['alignment' => ['wrapText' => true]],
            'I' => ['alignment' => ['wrapText' => true]],

        ];
    }

    // Ajuste la largeur des colonnes
    public function columnWidths(): array
    {
        return [
            'A' => 10,  // ID
            'B' => 50,
            'C' => 30,
            'D' => 40,
            'E' => 10,
            'F' => 15,
            'G' => 15,
            'H' => 30,
            'I' => 20,

        ];
    }

    public function title(): string
    {
        return 'Amendements'; // Nom fixe
    }
}
