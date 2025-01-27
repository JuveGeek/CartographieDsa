<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DifficulteProjet extends Model
{
    protected $fillable = ['description', 'date'];

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }

    public function propositionSolutions()
    {
        return $this->hasMany(PropositionSolution::class);
    }
}
