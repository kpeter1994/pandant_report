<?php

namespace App\Filament\Resources\DailyReports\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class DailyReportsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                DatePicker::make('report_date')
                    ->required(),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
