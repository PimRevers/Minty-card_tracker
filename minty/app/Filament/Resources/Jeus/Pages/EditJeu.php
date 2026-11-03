<?php

namespace App\Filament\Resources\Jeus\Pages;

use App\Filament\Resources\Jeus\JeuResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditJeu extends EditRecord
{
    protected static string $resource = JeuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
