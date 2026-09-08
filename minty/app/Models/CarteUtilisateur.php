<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CarteUtilisateur extends Pivot
{
    use HasFactory;

    protected $table = 'carte_utilisateur';

    protected $fillable = [
        'utilisateur_id',
        'carte_id',
        'statut',
        'quantite',
    ];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }

    public function carte()
    {
        return $this->belongsTo(Carte::class);
    }
}