<?php

namespace App\Filament\Resources\Events\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class EventForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('daily_reports_id')
                    ->required()
                    ->numeric(),
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
                TextInput::make('eventable_id')
                    ->numeric()
                    ->default(null),
                TextInput::make('eventable_type')
                    ->default(null),
            ]);
    }
}
