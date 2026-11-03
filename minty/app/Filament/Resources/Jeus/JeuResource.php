<?php

namespace App\Filament\Resources\Jeus;

use App\Filament\Resources\Jeus\Pages\CreateJeu;
use App\Filament\Resources\Jeus\Pages\EditJeu;
use App\Filament\Resources\Jeus\Pages\ListJeus;
use App\Filament\Resources\Jeus\Pages\ViewJeu;
use App\Filament\Resources\Jeus\Schemas\JeuForm;
use App\Filament\Resources\Jeus\Schemas\JeuInfolist;
use App\Filament\Resources\Jeus\Tables\JeusTable;
use App\Models\Jeu;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class JeuResource extends Resource
{
    protected static ?string $model = Jeu::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-puzzle-piece';
    protected static string|UnitEnum|null $navigationGroup = 'TCG & Univers';
    protected static ?string $modelLabel = 'Jeu TCG';
    protected static ?string $pluralModelLabel = 'Jeux TCG';
    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return JeuForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return JeuInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return JeusTable::configure($table);
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
            'index' => ListJeus::route('/'),
            'create' => CreateJeu::route('/create'),
            'view' => ViewJeu::route('/{record}'),
            'edit' => EditJeu::route('/{record}/edit'),
        ];
    }
}
