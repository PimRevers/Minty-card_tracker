<?php

namespace App\Filament\Resources\CarteUtilisateurs\Pages;

use App\Filament\Resources\CarteUtilisateurs\CarteUtilisateurResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCarteUtilisateur extends ViewRecord
{
    protected static string $resource = CarteUtilisateurResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
