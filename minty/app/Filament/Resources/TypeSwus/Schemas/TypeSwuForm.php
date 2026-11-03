<?php

namespace App\Filament\Resources\TypeSwus\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TypeSwuForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informations de Base')
                    ->description('Nom, rareté et caractéristiques principales')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('nom')
                                ->label('Nom de la carte')
                                ->required()
                                ->maxLength(255)
                                ->placeholder('ex: Luke Skywalker'),
                            TextInput::make('sous_nom')
                                ->label('Sous-nom / Titre')
                                ->placeholder('ex: Héros de Yavin'),
                            Select::make('rarete')
                                ->label('Rareté')
                                ->options([
                                    'Commune' => 'Commune',
                                    'Peu commune' => 'Peu commune',
                                    'Rare' => 'Rare',
                                    'Légendaire' => 'Légendaire',
                                    'Spéciale' => 'Spéciale',
                                ])
                                ->required()
                                ->native(false),
                            Select::make('arene')
                                ->label('Arène')
                                ->options([
                                    'Terrestre' => 'Terrestre',
                                    'Spatiale' => 'Spatiale',
                                    'Leader' => 'Leader',
                                    'Base' => 'Base',
                                ])
                                ->required()
                                ->native(false),
                        ]),
                    ]),

                Section::make('Statistiques & Coût')
                    ->schema([
                        Grid::make(5)->schema([
                            TextInput::make('cout')
                                ->label('Coût')
                                ->numeric()
                                ->required()
                                ->default(0),
                            TextInput::make('puissance')
                                ->label('Attaque')
                                ->numeric()
                                ->required()
                                ->default(0),
                            TextInput::make('pv')
                                ->label('Points de Vie')
                                ->numeric()
                                ->required()
                                ->default(0),
                            TextInput::make('up_puiss')
                                ->label('Up Attaque (Leader)')
                                ->numeric()
                                ->default(0),
                            TextInput::make('up_pv')
                                ->label('Up PV (Leader)')
                                ->numeric()
                                ->default(0),
                        ]),
                    ]),

                Section::make('Affinités, Types & Mots-Clés')
                    ->schema([
                        Grid::make(2)->schema([
                            TagsInput::make('affinites')
                                ->label('Affinités')
                                ->placeholder('Vigilance, Commandement, Héroïsme...'),
                            TagsInput::make('types')
                                ->label('Types de Carte')
                                ->placeholder('Unité, Amélioration, Événement...'),
                            TagsInput::make('traits')
                                ->label('Traits')
                                ->placeholder('Rebelle, Jedi, Véhicule, Pilote...'),
                            TagsInput::make('mot_cles')
                                ->label('Mots-Clés')
                                ->placeholder('Sentinelle, Embuscade, Bouclier...'),
                        ]),
                    ]),

                Section::make('Visuels & Textes de règles')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('image_recto')
                                ->label('URL Image Recto')
                                ->url()
                                ->placeholder('https://...'),
                            TextInput::make('image_verso')
                                ->label('URL Image Verso')
                                ->url()
                                ->placeholder('https://...'),
                            Textarea::make('description_recto')
                                ->label('Capacité Recto')
                                ->rows(3)
                                ->placeholder('Description de la capacité face avant...'),
                            Textarea::make('description_verso')
                                ->label('Capacité Verso')
                                ->rows(3)
                                ->placeholder('Description de la capacité face arrière (Leader déployé)...'),
                        ]),
                    ]),
            ]);
    }
}
