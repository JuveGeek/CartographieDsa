<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point_focal extends Model
{
    protected $fillable = ['date_debut', 'date_fin'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function structurePorteuse()
    {
        return $this->belongsTo(StructurePorteuse::class);
    }
}
