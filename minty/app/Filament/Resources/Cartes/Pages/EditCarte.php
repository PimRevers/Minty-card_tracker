<?php

namespace App\Filament\Resources\Cartes\Pages;

use App\Filament\Resources\Cartes\CarteResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditCarte extends EditRecord
{
    protected static string $resource = CarteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
