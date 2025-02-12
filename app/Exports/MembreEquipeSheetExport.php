<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Projet;
use Maatwebsite\Excel\Concerns\WithTitle;

class MembreEquipeSheetExport implements FromCollection, WithHeadings, WithTitle
{
    protected $projetId;

    public function __construct($projetId)
    {
        $this->projetId = $projetId;
    }
    public function collection()
    {

        // Récupérer l'équipe associée au projet
        $equipe = Projet::findOrFail($this->projetId)->equipe; // Relation hasOne avec Equipe

        // Récupérer les utilisateurs de cette équipe avec les données du pivot
        return $equipe->users()
            ->withPivot('statut', 'role', 'actif', 'date_debut', 'date_fin') // Récupère les données pivot
            ->get()
            ->map(function ($user) use ($equipe) {
                // Ajouter les informations de l'utilisateur et du pivot
                return [
                    'id' => $user->id,
                    'nom' => $user->name,
                    'prenom' => $user->firstname,
                    'email' => $user->email,

                    'role' => $user->pivot->role, // Donnée du pivot
                    'status' => $user->pivot->status, // Donnée du pivot

                    'actif' => $user->pivot->actif, // Donnée du pivot
                    'date_debut' => $user->pivot->date_debut, // Donnée du pivot
                    'date_fin' => $user->pivot->date_fin, // Donnée du pivot
                    'nom_equipe' => $equipe->nom, // Nom de l'équipe
                ];
            });


    }

    public function headings(): array
    {
        return ['ID', 'Nom', 'Prénom', 'Email', 'Role', 'Status', 'actif', 'Date de début',
        'Date de fin', 'Equipe'];
    }

    public function title(): string
    {
        return 'Membres equipe'; // Nom fixe
    }
}
