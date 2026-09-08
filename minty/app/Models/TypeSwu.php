<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class TypeSwu extends Model
{
    use HasFactory;

    protected $table = 'type_swu';

    protected $fillable = [
        'image_recto',
        'image_verso',
        'nom',
        'sous_nom',
        'affinites',
        'types',
        'arene',
        'mot_cles',
        'cout',
        'traits',
        'puissance',
        'rarete',
        'pv',
        'description_recto',
        'description_verso',
        'up_puiss',
        'up_pv',
    ];

    protected $casts = [
        'affinites' => 'array',
        'types' => 'array',
        'mot_cles' => 'array',
        'traits' => 'array',
    ];

    public function cartes()
    {
        return $this->morphMany(Carte::class, 'cardable');
    }
}