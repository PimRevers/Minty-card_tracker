<?php

namespace App\Filament\Resources\CarteUtilisateurs\Pages;

use App\Filament\Resources\CarteUtilisateurs\CarteUtilisateurResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCarteUtilisateurs extends ListRecords
{
    protected static string $resource = CarteUtilisateurResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
