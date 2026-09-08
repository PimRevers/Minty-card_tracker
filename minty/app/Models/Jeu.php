<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jeu extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'logo',
        'date_creation',
        'description',
    ];

    protected $casts = [
        'date_creation' => 'datetime',
    ];

    public function extensions()
    {
        return $this->hasMany(Extension::class);
    }
}