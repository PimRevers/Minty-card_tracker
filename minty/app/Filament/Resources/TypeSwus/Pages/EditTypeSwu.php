<?php

namespace App\Filament\Resources\TypeSwus\Pages;

use App\Filament\Resources\TypeSwus\TypeSwuResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditTypeSwu extends EditRecord
{
    protected static string $resource = TypeSwuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
