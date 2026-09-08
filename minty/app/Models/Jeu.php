<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jeu extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'logo',
        'date_creation',
        'description',
    ];

    public function extensions()
    {
        return $this->hasMany(Extension::class);
    }
}
