<?php

namespace App\Filament\Resources\DailyReports;

use App\Filament\Resources\DailyReports\Pages\CreateDailyReports;
use App\Filament\Resources\DailyReports\Pages\EditDailyReports;
use App\Filament\Resources\DailyReports\Pages\ListDailyReports;
use App\Filament\Resources\DailyReports\Schemas\DailyReportsForm;
use App\Filament\Resources\DailyReports\Tables\DailyReportsTable;
use App\Models\DailyReports;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DailyReportsResource extends Resource
{
    protected static ?string $model = DailyReports::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return DailyReportsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DailyReportsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDailyReports::route('/'),
            'create' => CreateDailyReports::route('/create'),
            'edit' => EditDailyReports::route('/{record}/edit'),
        ];
    }
}
