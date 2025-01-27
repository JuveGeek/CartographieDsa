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

    public function personnels()
    {
        return $this->hasMany(Personnel::class);
    }
}
