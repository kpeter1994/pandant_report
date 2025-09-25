<?php

namespace App\Filament\Resources\SiteEvents;

use App\Filament\Resources\SiteEvents\Pages\CreateSiteEvent;
use App\Filament\Resources\SiteEvents\Pages\EditSiteEvent;
use App\Filament\Resources\SiteEvents\Pages\ListSiteEvents;
use App\Filament\Resources\SiteEvents\Schemas\SiteEventForm;
use App\Filament\Resources\SiteEvents\Tables\SiteEventsTable;
use App\Models\SiteEvent;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SiteEventResource extends Resource
{
    protected static ?string $model = SiteEvent::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::BuildingOffice;

    public static function getPluralLabel(): string
    {
        return 'Telephelyi események';
    }

    protected static string|\UnitEnum|null $navigationGroup = 'Események';

    public static function form(Schema $schema): Schema
    {
        return SiteEventForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SiteEventsTable::configure($table);
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
            'index' => ListSiteEvents::route('/'),
            'create' => CreateSiteEvent::route('/create'),
            'edit' => EditSiteEvent::route('/{record}/edit'),
        ];
    }
}
