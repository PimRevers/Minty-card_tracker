<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Utilisateur extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'utilisateurs';

    protected $fillable = [
        'nom',
        'prenom',
        'pseudo',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function setRememberToken($value)
    {
        // Safe set if column exists or skip
        if (!empty($this->getRememberTokenName())) {
            $this->attributes[$this->getRememberTokenName()] = $value;
        }
    }

    public function cartes()
    {
        return $this->belongsToMany(
            Carte::class,
            'carte_utilisateur',
            'utilisateur_id',
            'carte_id'
        )->withPivot('statut', 'quantite')->withTimestamps();
    }
}