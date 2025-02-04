<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class StructureBeneficiaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'statut',
        'etat',
        'annee_deploiement',
        'annee_exploitation',
        'commentaire'
    ];

    protected $casts = [
        'date_deploiement' => 'date',
        'annee_exploitation' => 'integer',
    ];

    public function projets()
    {
        return $this->belongsToMany(Projet::class, 'projet_structure_beneficiaire')
                    ->withTimestamps();
    }
}
