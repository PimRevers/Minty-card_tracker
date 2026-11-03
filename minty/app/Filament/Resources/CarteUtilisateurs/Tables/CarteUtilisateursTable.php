<?php

namespace App\Filament\Resources\CarteUtilisateurs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class CarteUtilisateursTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('utilisateur.pseudo')
                    ->label('Collectionneur')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                TextColumn::make('carte.extension.jeu.nom')
                    ->label('Jeu')
                    ->badge()
                    ->color('info')
                    ->sortable(),
                TextColumn::make('carte.extension.nom')
                    ->label('Extension')
                    ->badge()
                    ->color('gray')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('carte.cardable.nom')
                    ->label('Nom de la Carte')
                    ->searchable()
                    ->weight('medium'),
                TextColumn::make('statut')
                    ->label('État')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'NM' => 'success',
                        'EX' => 'info',
                        'GD' => 'warning',
                        'LP' => 'danger',
                        default => 'gray',
                    })
                    ->sortable(),
                TextColumn::make('quantite')
                    ->label('Qté')
                    ->numeric()
                    ->badge()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Ajouté le')
                    ->dateTime('d/m/Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('statut')
                    ->label('Filtrer par État')
                    ->options([
                        'NM' => 'Near Mint (NM)',
                        'EX' => 'Excellent (EX)',
                        'GD' => 'Good (GD)',
                        'LP' => 'Light Played (LP)',
                    ]),
                SelectFilter::make('utilisateur_id')
                    ->label('Filtrer par Collectionneur')
                    ->relationship('utilisateur', 'pseudo')
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
