<?php

namespace App\Filament\Resources\CarteUtilisateurs;

use App\Filament\Resources\CarteUtilisateurs\Pages\CreateCarteUtilisateur;
use App\Filament\Resources\CarteUtilisateurs\Pages\EditCarteUtilisateur;
use App\Filament\Resources\CarteUtilisateurs\Pages\ListCarteUtilisateurs;
use App\Filament\Resources\CarteUtilisateurs\Pages\ViewCarteUtilisateur;
use App\Filament\Resources\CarteUtilisateurs\Schemas\CarteUtilisateurForm;
use App\Filament\Resources\CarteUtilisateurs\Schemas\CarteUtilisateurInfolist;
use App\Filament\Resources\CarteUtilisateurs\Tables\CarteUtilisateursTable;
use App\Models\CarteUtilisateur;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CarteUtilisateurResource extends Resource
{
    protected static ?string $model = CarteUtilisateur::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-bookmark-square';
    protected static string|UnitEnum|null $navigationGroup = 'Collection & Classeurs';
    protected static ?string $modelLabel = 'Carte en Collection';
    protected static ?string $pluralModelLabel = 'Classeurs & Collections';
    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return CarteUtilisateurForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CarteUtilisateurInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CarteUtilisateursTable::configure($table);
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
            'index' => ListCarteUtilisateurs::route('/'),
            'create' => CreateCarteUtilisateur::route('/create'),
            'view' => ViewCarteUtilisateur::route('/{record}'),
            'edit' => EditCarteUtilisateur::route('/{record}/edit'),
        ];
    }
}
