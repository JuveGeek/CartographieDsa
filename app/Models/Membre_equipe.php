<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membre_equipe extends Model
{
    protected $table = 'membre_equipe';

    protected $fillable = ['equipe_id', 'role', 'statut', 'actif', 'date_debut', 'date_fin', 'user_id',];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function equipe()
    {
        return $this->belongsTo(Equipe::class);
    }
}
