<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fonctionnalite extends Model
{
    protected $fillable = ['nom', 'description', 'date_debut', 'date_fin', 'statut'];

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }
}
