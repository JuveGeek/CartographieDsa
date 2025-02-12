<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use App\Models\Projet;

class ProjetMultiSheetExport implements WithMultipleSheets
{
    protected $projetId;

    public function __construct($projetId)
    {
        $this->projetId = $projetId;

    }
    public function sheets(): array
    {

        return [
            'Projet' => new ProjetSheetExport($this->projetId),
            'Technologies' => new TechnologieSheetExport($this->projetId),
            'Fonctionnalites' => new FonctionnaliteSheetExport($this->projetId),
            'Amendements' => new AmendementSheetExport($this->projetId),
            'DifficulteProjets' => new DifficulteProjetSheetExport($this->projetId),

            'MembreEquipes' => new MembreEquipeSheetExport($this->projetId),
            'PointFocal' => new PointFocalSheetExport($this->projetId),
            'StructureBeneficiaires' => new StructureBeneficiaireSheetExport($this->projetId),


        ];
    }
}
