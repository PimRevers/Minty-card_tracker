<?php

namespace App\Filament\Resources\CarteUtilisateurs\Pages;

use App\Filament\Resources\CarteUtilisateurs\CarteUtilisateurResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditCarteUtilisateur extends EditRecord
{
    protected static string $resource = CarteUtilisateurResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
