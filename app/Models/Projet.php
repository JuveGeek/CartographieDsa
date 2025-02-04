<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    protected $fillable = ['nom', 'description','date_debut','date_fin','statut','structure_porteuse_id','objectif_principal','public_cible','phase_actuelle'];

    public function fonctionnalites()
    {
        return $this->hasMany(Fonctionnalite::class);
    }

    public function technologies()
    {
        //return $this->belongsToMany(Technologie::class);
        return $this->hasMany(Technologie::class);
    }

    public function difficulteProjets()
    {
        return $this->hasMany(DifficulteProjet::class);
    }

    public function amendements()
    {
        return $this->hasMany(Amendement::class);
    }

    public function structurePorteuse()
    {
        return $this->belongsTo(StructurePorteuse::class,'structure_porteuse_id');
    }

    public function equipe()
    {
        return $this->hasOne(Equipe::class);
    }

    public function structuresBeneficiaires()
    {
        return $this->belongsToMany(StructureBeneficiaire::class, 'projet_structure_beneficiaire')
                    ->withTimestamps();
    }

    public function pointsFocaux()
    {
        return $this->structurePorteuse->pointsFocaux();
    }

}
