<?php

namespace App\Filament\Resources\TypeSwus\Pages;

use App\Filament\Resources\TypeSwus\TypeSwuResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewTypeSwu extends ViewRecord
{
    protected static string $resource = TypeSwuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
