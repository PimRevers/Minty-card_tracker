<?php

namespace App\Filament\Resources\Cartes\Pages;

use App\Filament\Resources\Cartes\CarteResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCartes extends ListRecords
{
    protected static string $resource = CarteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
