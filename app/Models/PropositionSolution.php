<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropositionSolution extends Model
{
    protected $fillable = ['description', 'date'];

    public function difficulteProjet()
    {
        return $this->belongsTo(DifficulteProjet::class);
    }
}
