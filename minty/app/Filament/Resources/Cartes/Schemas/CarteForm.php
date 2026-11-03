<?php

namespace App\Filament\Resources\Cartes\Schemas;

use App\Models\TypeSwu;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CarteForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('extension_id')
                    ->label('Extension')
                    ->relationship('extension', 'nom')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->native(false),
                Select::make('cardable_type')
                    ->label('Type / Moteur de jeu')
                    ->options([
                        TypeSwu::class => 'Star Wars: Unlimited (Type SWU)',
                    ])
                    ->default(TypeSwu::class)
                    ->required()
                    ->native(false),
                Select::make('cardable_id')
                    ->label('Carte associée')
                    ->options(function () {
                        try {
                            return TypeSwu::all()->pluck('nom', 'id');
                        } catch (\Throwable $e) {
                            return [];
                        }
                    })
                    ->searchable()
                    ->required()
                    ->native(false),
            ]);
    }
}
