<?php

namespace App\Filament\Resources\DailyReports\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

class DailyReportForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                DatePicker::make('report_date')
                    ->required()->visible(fn () => Auth::user()?->role === 'Admin'),
                Toggle::make('is_active')
                    ->required()->required()->visible(fn () => Auth::user()?->role === 'Admin'),
            ]);
    }
}
