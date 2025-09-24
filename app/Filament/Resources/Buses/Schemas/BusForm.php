<?php

namespace App\Filament\Resources\Buses\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BusForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('license_plate')
                    ->required()->label('Rendszám'),
                Select::make('site_id')->relationship('site', 'name')
                    ->label('Telephely')
                    ->required(),
                Select::make('bus_types_id')
                    ->relationship('busType', 'name')
                    ->label('Busz típus')
                    ->required()
            ]);
    }
}
