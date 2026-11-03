<?php

namespace App\Filament\Resources\Cartes\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class CartesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->sortable(),
                TextColumn::make('extension.jeu.nom')
                    ->label('Jeu')
                    ->badge()
                    ->color('info')
                    ->sortable(),
                TextColumn::make('extension.nom')
                    ->label('Extension')
                    ->badge()
                    ->color('gray')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('cardable.nom')
                    ->label('Nom de la Carte')
                    ->searchable()
                    ->weight('bold'),
                TextColumn::make('utilisateurs_count')
                    ->label('En classeurs')
                    ->counts('utilisateurs')
                    ->badge()
                    ->color('success'),
                TextColumn::make('created_at')
                    ->label('Ajouté le')
                    ->dateTime('d/m/Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('extension_id')
                    ->label('Filtrer par Extension')
                    ->relationship('extension', 'nom')
                    ->searchable()
                    ->preload(),
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
