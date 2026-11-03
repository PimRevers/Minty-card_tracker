<?php

namespace App\Filament\Resources\TypeSwus\Pages;

use App\Filament\Resources\TypeSwus\TypeSwuResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTypeSwus extends ListRecords
{
    protected static string $resource = TypeSwuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
