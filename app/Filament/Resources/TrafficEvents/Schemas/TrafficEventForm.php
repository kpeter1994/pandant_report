<?php

namespace App\Filament\Resources\TrafficEvents\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class TrafficEventForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('bus_id')
                    ->required()
                    ->relationship('bus', 'license_plate')->searchable()->preload(),
                TextInput::make('title')
                    ->required(),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('dispatch')
                    ->default(null)
                    ->columnSpanFull(),
                DateTimePicker::make('event_time'),
                TextInput::make('damage_value')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('personal_injury')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
