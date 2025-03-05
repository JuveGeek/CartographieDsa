<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point_focal extends Model
{
    protected $table = 'point_focal';  // Spécifie le nom exact de la table

    protected $fillable = ['id', 'date_debut', 'date_fin'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function structurePorteuse()
    {
        return $this->belongsTo(StructurePorteuse::class);
    }
}
