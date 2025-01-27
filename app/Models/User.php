<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;
    use HasApiTokens;
    use HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /*protected $fillable = [
        'name', 'email', 'password',
    ];*/

    //protected $fillable = ['name', 'prenom', 'fonction', 'tel', 'email', 'date'];

    protected $fillable = ['name', 'firstname', 'tel', 'email', 'password'];

    public function structurePorteuse()
    {
        return $this->belongsTo(StructurePorteuse::class);
    }

    public function equipes()
    {
        return $this->belongsToMany(Equipe::class, 'membre_equipe')
                    ->withPivot('role', 'statut', 'actif', 'date_debut', 'date_fin');
    }

    public function pointFocals()
    {
        return $this->belongsToMany(StructurePorteuse::class, 'point_focal')
                    ->withPivot('date_debut', 'date_fin');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The attributes that appends to returned entities.
     *
     * @var array
     */
    protected $appends = ['photo'];

    /**
     * The getter that return accessible URL for user photo.
     *
     * @var array
     */
    public function getPhotoUrlAttribute()
    {
        if ($this->foto !== null) {
            return url('media/user/' . $this->id . '/' . $this->foto);
        } else {
            return url('media-example/no-image.png');
        }
    }
}
