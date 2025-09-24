<?php

namespace App\Filament\Resources\ServiceWorksheets\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ServiceWorksheetForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('bus_id')
                    ->required()
                    ->numeric(),
                TextInput::make('service_type_id')
                    ->required()
                    ->numeric(),
                DateTimePicker::make('start')
                    ->required(),
                DateTimePicker::make('end'),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
