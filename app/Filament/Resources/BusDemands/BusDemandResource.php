<?php

namespace App\Filament\Resources\BusDemands;

use App\Filament\Resources\BusDemands\Pages\CreateBusDemand;
use App\Filament\Resources\BusDemands\Pages\EditBusDemand;
use App\Filament\Resources\BusDemands\Pages\ListBusDemands;
use App\Filament\Resources\BusDemands\Schemas\BusDemandForm;
use App\Filament\Resources\BusDemands\Tables\BusDemandsTable;
use App\Models\BusDemand;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BusDemandResource extends Resource
{
    protected static ?string $model = BusDemand::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ClipboardDocumentCheck;

    public static function getPluralLabel(): string
    {
        return 'Napi igények';
    }

    public static function form(Schema $schema): Schema
    {
        return BusDemandForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BusDemandsTable::configure($table);
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
            'index' => ListBusDemands::route('/'),
            'create' => CreateBusDemand::route('/create'),
            'edit' => EditBusDemand::route('/{record}/edit'),
        ];
    }
}
