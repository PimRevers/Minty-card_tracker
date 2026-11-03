<?php

namespace App\Filament\Resources\TypeSwus\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class TypeSwusTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_recto')
                    ->label('Carte')
                    ->height(65)
                    ->square()
                    ->defaultImageUrl('https://via.placeholder.com/60x84?text=SWU'),
                TextColumn::make('nom')
                    ->label('Nom')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->description(fn ($record) => $record->sous_nom ?: null),
                TextColumn::make('cout')
                    ->label('Coût')
                    ->numeric()
                    ->badge()
                    ->color('warning')
                    ->sortable(),
                TextColumn::make('puissance')
                    ->label('ATQ')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('pv')
                    ->label('PV')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('rarete')
                    ->label('Rareté')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Légendaire' => 'warning',
                        'Rare' => 'success',
                        'Peu commune' => 'info',
                        'Spéciale' => 'purple',
                        default => 'gray',
                    })
                    ->sortable(),
                TextColumn::make('arene')
                    ->label('Arène')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Terrestre' => 'emerald',
                        'Spatiale' => 'blue',
                        'Leader' => 'amber',
                        default => 'slate',
                    }),
                TextColumn::make('affinites')
                    ->label('Affinités')
                    ->badge()
                    ->separator(',')
                    ->toggleable(),
            ])
            ->filters([
                SelectFilter::make('rarete')
                    ->label('Rareté')
                    ->options([
                        'Commune' => 'Commune',
                        'Peu commune' => 'Peu commune',
                        'Rare' => 'Rare',
                        'Légendaire' => 'Légendaire',
                        'Spéciale' => 'Spéciale',
                    ]),
                SelectFilter::make('arene')
                    ->label('Arène')
                    ->options([
                        'Terrestre' => 'Terrestre',
                        'Spatiale' => 'Spatiale',
                        'Leader' => 'Leader',
                        'Base' => 'Base',
                    ]),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
