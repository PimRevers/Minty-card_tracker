<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Extension extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'code',
        'nb_cartes',
        'jeu_id',
    ];

    public function jeu()
    {
        return $this->belongsTo(Jeu::class);
    }

    public function cartes()
    {
        return $this->hasMany(Carte::class);
    }
}
