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
                TextInput::make('daily_reports_id')
                    ->required()
                    ->numeric(),
                TextInput::make('site_id')
                    ->required()
                    ->numeric(),
                Select::make('bus_types_id')
                    ->required()
                    ->relationship('busType', 'name'),
                TextInput::make('garden')
                    ->required()
                    ->numeric(),
                TextInput::make('got')
                    ->required()
                    ->numeric(),
            ]);
    }
}
