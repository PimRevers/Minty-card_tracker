<?php

namespace App\Filament\Resources\Jeus\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class JeuForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nom')
                    ->label('Nom du Jeu')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('ex: Star Wars: Unlimited'),
                TextInput::make('logo')
                    ->label('URL du Logo')
                    ->required()
                    ->url()
                    ->maxLength(255)
                    ->placeholder('https://starwarsunlimited.com/images/logo.png'),
                DatePicker::make('date_creation')
                    ->label('Date de sortie officielle')
                    ->required()
                    ->native(false),
                Textarea::make('description')
                    ->label('Description du Jeu')
                    ->required()
                    ->rows(4)
                    ->columnSpanFull()
                    ->placeholder('Présentation rapide de l\'univers et des mécaniques TCG...'),
            ]);
    }
}
