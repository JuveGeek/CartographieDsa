<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    protected $fillable = ['nom', 'date_debut', 'date_fin'];

    public function projets()
    {
        return $this->hasMany(Projet::class);
    }

    public function personnels()
    {
        return $this->belongsToMany(Personnel::class, 'membre_equipe')
                    ->withPivot('role', 'statut', 'actif', 'date_debut', 'date_fin');
    }
}
