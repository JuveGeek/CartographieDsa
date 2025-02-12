<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Projet;
use Maatwebsite\Excel\Concerns\WithTitle;

class DifficulteProjetSheetExport implements FromCollection, WithHeadings, WithTitle
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

    public function title(): string
    {
        return 'Difficultes du projet'; // Nom fixe
    }
}
