<?php

namespace App\Filament\Resources\CarteUtilisateurs\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CarteUtilisateurForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('utilisateur_id')
                    ->label('Collectionneur')
                    ->relationship('utilisateur', 'pseudo')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->native(false),
                Select::make('carte_id')
                    ->label('Carte (# ID)')
                    ->relationship('carte', 'id')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->native(false),
                Select::make('statut')
                    ->label('État de conservation (Grading)')
                    ->options([
                        'NM' => 'Near Mint (NM) — Comme neuf',
                        'EX' => 'Excellent (EX) — Micro-défauts légers',
                        'GD' => 'Good (GD) — Usure visible',
                        'LP' => 'Light Played (LP) — Joué / Blanchi',
                    ])
                    ->required()
                    ->default('NM')
                    ->native(false),
                TextInput::make('quantite')
                    ->label('Nombre d\'exemplaires (Doublons)')
                    ->numeric()
                    ->required()
                    ->default(1)
                    ->minValue(1),
            ]);
    }
}
