<?php

namespace App\Filament\Resources\Cartes;

use App\Filament\Resources\Cartes\Pages\CreateCarte;
use App\Filament\Resources\Cartes\Pages\EditCarte;
use App\Filament\Resources\Cartes\Pages\ListCartes;
use App\Filament\Resources\Cartes\Pages\ViewCarte;
use App\Filament\Resources\Cartes\Schemas\CarteForm;
use App\Filament\Resources\Cartes\Schemas\CarteInfolist;
use App\Filament\Resources\Cartes\Tables\CartesTable;
use App\Models\Carte;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CarteResource extends Resource
{
    protected static ?string $model = Carte::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-identification';
    protected static string|UnitEnum|null $navigationGroup = 'Catalogue Cartes';
    protected static ?string $modelLabel = 'Entrée Carte';
    protected static ?string $pluralModelLabel = 'Toutes les Cartes';
    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return CarteForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CarteInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CartesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCartes::route('/'),
            'create' => CreateCarte::route('/create'),
            'view' => ViewCarte::route('/{record}'),
            'edit' => EditCarte::route('/{record}/edit'),
        ];
    }
}
