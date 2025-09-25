<?php

namespace App\Filament\Resources\ServiceWorksheets\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ServiceWorksheetForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('buses')->multiple()->relationship('buses', 'license_plate')->searchable()->preload()->required(),
                Select::make('service_type_id')
                    ->required()
                    ->relationship('serviceType', 'name'),
                DateTimePicker::make('start')
                    ->required(),
                DateTimePicker::make('end'),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
