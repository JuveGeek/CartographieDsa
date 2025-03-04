<?php
namespace App\Exports;

use App\Models\Projet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TechnologieSheetExport implements FromCollection, WithHeadings, WithTitle, WithStyles, WithColumnWidths
{
    protected $projetId;

    public function __construct($projetId)
    {
        $this->projetId = $projetId;
    }
    public function collection()
    {

        return Projet::findOrFail($this->projetId)
            ->technologies()
            ->select('technologies.id', 'technologies.nom', 'technologies.description', 'technologies.role', 'technologies.version', 'technologies.statut')
            ->get();

    }

    public function headings(): array
    {
        return ['ID', 'Nom', 'Description', 'Role', 'Version', 'Statut'];
    }

    public function title(): string
    {
        return 'Technologies'; // Nom fixe
    }

    // Active le retour à la ligne dans la colonne "Description"
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

            'C' => 50, // Description (large pour le texte long)
            'D' => 25,

        ];
    }
}
