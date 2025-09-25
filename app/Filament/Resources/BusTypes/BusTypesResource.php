<?php

namespace App\Filament\Resources\BusTypes;

use App\Filament\Resources\BusTypes\Pages\CreateBusTypes;
use App\Filament\Resources\BusTypes\Pages\EditBusTypes;
use App\Filament\Resources\BusTypes\Pages\ListBusTypes;
use App\Filament\Resources\BusTypes\Schemas\BusTypesForm;
use App\Filament\Resources\BusTypes\Tables\BusTypesTable;
use App\Models\BusTypes;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BusTypesResource extends Resource
{
    protected static ?string $model = BusTypes::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Swatch;

    protected static string|\UnitEnum|null $navigationGroup = 'Admin';

    public static function getPluralLabel(): string
    {
        return 'Busztípusok';
    }

    public static function form(Schema $schema): Schema
    {
        return BusTypesForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BusTypesTable::configure($table);
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
            'index' => ListBusTypes::route('/'),
            'create' => CreateBusTypes::route('/create'),
            'edit' => EditBusTypes::route('/{record}/edit'),
        ];
    }
}
