<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Projet;
use Maatwebsite\Excel\Concerns\WithTitle;

class FonctionnaliteSheetExport implements FromCollection, WithHeadings, WithTitle
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

    public function title(): string
    {
        return 'Fonctionnalites'; // Nom fixe
    }
}
