<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point_focal extends Model
{
    protected $fillable = ['date_debut', 'date_fin'];

    public function personnel()
    {
        return $this->belongsTo(Personnel::class);
    }

    public function structurePorteuse()
    {
        return $this->belongsTo(StructurePorteuse::class);
    }
}
