<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membre_equipe extends Model
{
    protected $table = 'membre_equipe';

    protected $fillable = ['role', 'statut', 'actif', 'date_debut', 'date_fin'];

    public function personnel()
    {
        return $this->belongsTo(Personnel::class);
    }

    public function equipe()
    {
        return $this->belongsTo(Equipe::class);
    }
}
