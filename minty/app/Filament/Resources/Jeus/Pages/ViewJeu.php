<?php

namespace App\Filament\Resources\Jeus\Pages;

use App\Filament\Resources\Jeus\JeuResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewJeu extends ViewRecord
{
    protected static string $resource = JeuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
