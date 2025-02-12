<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Projet;
use Maatwebsite\Excel\Concerns\WithTitle;

class TechnologieSheetExport implements FromCollection, WithHeadings, WithTitle
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
            ->select('technologies.id', 'technologies.nom', 'technologies.description', 'technologies.role',  'technologies.version', 'technologies.statut')
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
}
