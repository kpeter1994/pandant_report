<?php

namespace App\Filament\Resources\ServiceWorksheets\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use phpDocumentor\Reflection\Types\Boolean;

class ServiceWorksheetForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('buses')->relationship('buses', 'license_plate')->searchable()->preload()->required(),
                Select::make('service_type_id')
                    ->required()
                    ->relationship('serviceType', 'name'),
                DateTimePicker::make('start')
                    ->required(),
                Toggle::make('open')
                    ->label('Nyitva')
                    ->default(true)
                    ->required(),
                DateTimePicker::make('end'),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
