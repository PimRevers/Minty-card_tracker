<?php

namespace App\Filament\Resources\Cartes\Pages;

use App\Filament\Resources\Cartes\CarteResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCarte extends ViewRecord
{
    protected static string $resource = CarteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
