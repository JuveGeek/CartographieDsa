<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StructurePorteuse extends Model
{
    protected $fillable = ['nom', 'adresse', 'date'];

    public function projets()
    {
        return $this->hasMany(Projet::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function pointsFocaux()
    {
        return $this->belongsToMany(User::class, 'point_focal', 'structure_porteuse_id', 'user_id')->withPivot('date_debut', 'date_fin');
    }
}
