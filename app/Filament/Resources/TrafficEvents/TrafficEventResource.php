<?php

namespace App\Filament\Resources\TrafficEvents;

use App\Filament\Resources\TrafficEvents\Pages\CreateTrafficEvent;
use App\Filament\Resources\TrafficEvents\Pages\EditTrafficEvent;
use App\Filament\Resources\TrafficEvents\Pages\ListTrafficEvents;
use App\Filament\Resources\TrafficEvents\Schemas\TrafficEventForm;
use App\Filament\Resources\TrafficEvents\Tables\TrafficEventsTable;
use App\Models\DailyReport;
use App\Models\TrafficEvent;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TrafficEventResource extends Resource
{
    protected static ?string $model = TrafficEvent::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ExclamationTriangle;

    protected static string|\UnitEnum|null $navigationGroup = 'Események';

    public static function getPluralLabel(): string
    {
        return 'Forgalmi események';
    }

    public static function getLabel(): string
    {
        return 'Forgalmi esemény';
    }

    public static function form(Schema $schema): Schema
    {
        return TrafficEventForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TrafficEventsTable::configure($table);
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
            'index' => ListTrafficEvents::route('/'),
            'create' => CreateTrafficEvent::route('/create'),
            'edit' => EditTrafficEvent::route('/{record}/edit'),
        ];
    }
}
