<?php

namespace App\Filament\Resources\ReportLists\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ReportListForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                Toggle::make('daily_report')
                    ->required(),
                Toggle::make('all_email')
                    ->required(),
                Select::make('site_id')
                    ->label('Telephely')
                    ->relationship('site', 'name')
                    ->required(),
            ]);
    }
}
