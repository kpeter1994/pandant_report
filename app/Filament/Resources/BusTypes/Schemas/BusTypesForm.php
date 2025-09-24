<?php

namespace App\Filament\Resources\BusTypes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BusTypesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
            ]);
    }
}
