<?php

namespace App\Filament\Resources\Jeus\Pages;

use App\Filament\Resources\Jeus\JeuResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListJeus extends ListRecords
{
    protected static string $resource = JeuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
