<?php

namespace App\Filament\Resources\BusDemands\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BusDemandForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('site_id')
                    ->required()
                    ->relationship('site', 'name')
                    ->label('Telephely')
                    ->default(fn () => auth()->user()->site?->id),
                Select::make('bus_types_id')
                    ->required()
                    ->relationship('busType', 'name')
                    ->label('Busz típus'),
                TextInput::make('garden')
                    ->required()
                    ->label('Leadott igény')
                    ->numeric(),
                TextInput::make('got')
                    ->label('Kiadott jármű')
                    ->required()
                    ->numeric(),
            ]);
    }
}
