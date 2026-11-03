<?php

namespace App\Filament\Resources\Extensions\Schemas;

use Filament\Schemas\Schema;

class ExtensionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
            ]);
    }
}
