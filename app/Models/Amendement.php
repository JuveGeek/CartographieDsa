<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amendement extends Model
{
    protected $fillable = ['description', 'source', 'statut', 'date'];

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }

    public function difficulteAmendements()
    {
        return $this->hasMany(DifficulteAmendement::class);
    }
}
