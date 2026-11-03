<?php

namespace App\Filament\Resources\Extensions;

use App\Filament\Resources\Extensions\Pages\CreateExtension;
use App\Filament\Resources\Extensions\Pages\EditExtension;
use App\Filament\Resources\Extensions\Pages\ListExtensions;
use App\Filament\Resources\Extensions\Pages\ViewExtension;
use App\Filament\Resources\Extensions\Schemas\ExtensionForm;
use App\Filament\Resources\Extensions\Schemas\ExtensionInfolist;
use App\Filament\Resources\Extensions\Tables\ExtensionsTable;
use App\Models\Extension;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ExtensionResource extends Resource
{
    protected static ?string $model = Extension::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-folder-open';
    protected static string|UnitEnum|null $navigationGroup = 'TCG & Univers';
    protected static ?string $modelLabel = 'Extension';
    protected static ?string $pluralModelLabel = 'Extensions';
    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return ExtensionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ExtensionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ExtensionsTable::configure($table);
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
            'index' => ListExtensions::route('/'),
            'create' => CreateExtension::route('/create'),
            'view' => ViewExtension::route('/{record}'),
            'edit' => EditExtension::route('/{record}/edit'),
        ];
    }
}
