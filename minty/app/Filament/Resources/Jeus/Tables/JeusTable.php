<?php

namespace App\Filament\Resources\Jeus\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class JeusTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('logo')
                    ->label('Logo')
                    ->circular()
                    ->defaultImageUrl(asset('images/logo.svg')),
                TextColumn::make('nom')
                    ->label('Nom du Jeu')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                TextColumn::make('extensions_count')
                    ->label('Extensions')
                    ->counts('extensions')
                    ->badge()
                    ->color('success'),
                TextColumn::make('date_creation')
                    ->label('Date de sortie')
                    ->date('d/m/Y')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Créé le')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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
