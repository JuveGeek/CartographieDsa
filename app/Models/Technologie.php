<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technologie extends Model
{
    protected $fillable = ['nom', 'description', 'role', 'version'];

    public function projets()
    {
        return $this->belongsToMany(Projet::class);
    }
}
