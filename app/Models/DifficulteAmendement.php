<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DifficulteAmendement extends Model
{
    protected $fillable = ['description', 'date'];

    public function amendement()
    {
        return $this->belongsTo(Amendement::class);
    }
}
