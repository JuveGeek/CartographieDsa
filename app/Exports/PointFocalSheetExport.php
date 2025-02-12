<?php
namespace App\Exports;

use App\Models\Projet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class PointFocalSheetExport implements FromCollection, WithHeadings, WithTitle
{
    protected $projetId;

    public function __construct($projetId)
    {
        $this->projetId = $projetId;
    }
    public function collection()
    {

        $projet = Projet::with('structurePorteuse.pointsFocaux.structurePorteuse')->findOrFail($this->projetId);

        // Récupérer les points focaux et les informations associées
        return $projet->structurePorteuse->pointsFocaux->map(function ($point_focal) {
            return [
                'id' => $point_focal->id,
                'nom' => $point_focal->name,
                'prenom' => $point_focal->firstname,
                'email' => $point_focal->email,
                'date_debut' => $point_focal->pivot->date_debut,
                'date_fin' => $point_focal->pivot->date_fin,
                'structure_porteuse' => $point_focal->structurePorteuse ? $point_focal->structurePorteuse->nom : 'Structure porteuse non définie', // Vérification de la structure porteuse
            ];
        });

    }

    public function headings(): array
    {
        return ['ID', 'Nom', 'Prénom', 'Email', 'Date de début', 'Date de fin', 'Structure porteuse'];
    }

    public function title(): string
    {
        return 'Point focal'; // Nom fixe
    }
}
