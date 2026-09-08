<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'pseudo',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

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