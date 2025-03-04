<?php

namespace App\Exports;

use App\Models\Projet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DifficulteProjetSheetExport implements FromCollection, WithHeadings, WithTitle, WithStyles, WithColumnWidths
{
    protected $projetId;

    public function __construct($projetId)
    {
        $this->projetId = $projetId;
    }
    public function collection()
    {

        return Projet::findOrFail($this->projetId)
            ->difficulteProjets()
            ->select('difficulte_projets.id', 'difficulte_projets.description', 'difficulte_projets.date', 'difficulte_projets.status')
            ->get();


    }

    public function headings(): array
    {
        return ['ID', 'Description', 'Date', 'Status'];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            'B' => ['alignment' => ['wrapText' => true]],
        ];
    }

    // Ajuste la largeur des colonnes
    public function columnWidths(): array
    {
        return [
            'A' => 10,  // ID
            'B' => 50,
            'C' => 20,
            'D' => 20,

        ];
    }

    public function title(): string
    {
        return 'Difficultes du projet'; // Nom fixe
    }
}
