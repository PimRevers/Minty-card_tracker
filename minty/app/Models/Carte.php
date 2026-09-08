<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Carte extends Model
{
    use HasFactory;

    protected $fillable = [
        'extension_id',
        'cardable_id',
        'cardable_type',
    ];

    public function extension()
    {
        return $this->belongsTo(Extension::class);
    }

    public function cardable()
    {
        return $this->morphTo();
    }

    public function utilisateurs()
    {
        return $this->belongsToMany(
            Utilisateur::class,
            'carte_utilisateur',
            'carte_id',
            'utilisateur_id'
        )->withPivot('statut', 'quantite')->withTimestamps();
    }
}