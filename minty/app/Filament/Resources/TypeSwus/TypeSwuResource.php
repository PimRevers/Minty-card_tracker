<?php

namespace App\Filament\Resources\TypeSwus;

use App\Filament\Resources\TypeSwus\Pages\CreateTypeSwu;
use App\Filament\Resources\TypeSwus\Pages\EditTypeSwu;
use App\Filament\Resources\TypeSwus\Pages\ListTypeSwus;
use App\Filament\Resources\TypeSwus\Pages\ViewTypeSwu;
use App\Filament\Resources\TypeSwus\Schemas\TypeSwuForm;
use App\Filament\Resources\TypeSwus\Schemas\TypeSwuInfolist;
use App\Filament\Resources\TypeSwus\Tables\TypeSwusTable;
use App\Models\TypeSwu;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TypeSwuResource extends Resource
{
    protected static ?string $model = TypeSwu::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-sparkles';
    protected static string|UnitEnum|null $navigationGroup = 'Catalogue Cartes';
    protected static ?string $modelLabel = 'Carte SWU';
    protected static ?string $pluralModelLabel = 'Cartes Star Wars (SWU)';
    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return TypeSwuForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return TypeSwuInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TypeSwusTable::configure($table);
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
            'index' => ListTypeSwus::route('/'),
            'create' => CreateTypeSwu::route('/create'),
            'view' => ViewTypeSwu::route('/{record}'),
            'edit' => EditTypeSwu::route('/{record}/edit'),
        ];
    }
}
