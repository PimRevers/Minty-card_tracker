<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeSwu extends Model
{
    use HasFactory;

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

    public function cartes()
    {
        return $this->morphMany(Carte::class, 'cardable');
    }
}
