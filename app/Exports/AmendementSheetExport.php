<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Projet;
use Maatwebsite\Excel\Concerns\WithTitle;

class AmendementSheetExport implements FromCollection, WithHeadings, WithTitle
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

    public function title(): string
    {
        return 'Amendements'; // Nom fixe
    }
}
