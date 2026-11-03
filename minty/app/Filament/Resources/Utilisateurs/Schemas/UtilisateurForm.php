<?php

namespace App\Filament\Resources\Utilisateurs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UtilisateurForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('pseudo')
                    ->label('Pseudonyme')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('ex: LukeCollector42'),
                TextInput::make('prenom')
                    ->label('Prénom')
                    ->required()
                    ->maxLength(255),
                TextInput::make('nom')
                    ->label('Nom de famille')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->label('Adresse email')
                    ->email()
                    ->required()
                    ->maxLength(191),
                TextInput::make('password')
                    ->label('Mot de passe')
                    ->password()
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn (string $operation): bool => $operation === 'create')
                    ->maxLength(255),
            ]);
    }
}
