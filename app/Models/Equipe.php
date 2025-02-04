<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    protected $fillable = ['nom','projet_id'];

    public function projets()
    {
        return $this->belongsTo(Projet::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'membre_equipe')
                    ->withPivot('role', 'statut', 'actif', 'date_debut', 'date_fin');
    }

}
