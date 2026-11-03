<?php

namespace App\Filament\Resources\Extensions\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ExtensionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('jeu_id')
                    ->label('Jeu TCG associé')
                    ->relationship('jeu', 'nom')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->native(false),
                TextInput::make('nom')
                    ->label('Nom de l\'extension')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('ex: Étincelle de Rébellion'),
                TextInput::make('code')
                    ->label('Code abrégé')
                    ->required()
                    ->maxLength(50)
                    ->placeholder('ex: SOR'),
                TextInput::make('nb_cartes')
                    ->label('Nombre de cartes au set')
                    ->required()
                    ->numeric()
                    ->minValue(1)
                    ->placeholder('ex: 252'),
            ]);
    }
}
