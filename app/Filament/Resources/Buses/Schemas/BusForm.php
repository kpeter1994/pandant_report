<?php

namespace App\Filament\Resources\Buses\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BusForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('license_plate')
                    ->required(),
                TextInput::make('site_id')
                    ->required()
                    ->numeric(),
                TextInput::make('bus_types_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}
