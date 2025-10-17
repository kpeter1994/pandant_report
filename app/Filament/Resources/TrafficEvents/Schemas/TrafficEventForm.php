<?php

namespace App\Filament\Resources\TrafficEvents\Schemas;

use Filament\Forms\Components\TimePicker;
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
                    ->label('Busz')
                    ->relationship('bus', 'license_plate')->searchable()->preload(),
                Textarea::make('description')
                    ->label("Esemény leírása")
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('dispatch')
                    ->default(null)
                    ->label("Tett intézkedés (*opcionális)")
                    ->columnSpanFull(),
                TimePicker::make('event_time')->label('Esemény időpontja'),
                TextInput::make('damage_value')
                    ->label('Kárérték')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('personal_injury')
                    ->label('Személyi sérültek száma')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
