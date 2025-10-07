<?php

namespace App\Filament\Resources\ReportLists;

use App\Filament\Resources\ReportLists\Pages\CreateReportList;
use App\Filament\Resources\ReportLists\Pages\EditReportList;
use App\Filament\Resources\ReportLists\Pages\ListReportLists;
use App\Filament\Resources\ReportLists\Schemas\ReportListForm;
use App\Filament\Resources\ReportLists\Tables\ReportListsTable;
use App\Models\ReportList;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ReportListResource extends Resource
{
    protected static ?string $model = ReportList::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function getPluralLabel(): string
    {
        return 'Jelentési lista';
    }

    protected static string|\UnitEnum|null $navigationGroup = 'Admin';

    public static function form(Schema $schema): Schema
    {
        return ReportListForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ReportListsTable::configure($table);
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
            'index' => ListReportLists::route('/'),
            'create' => CreateReportList::route('/create'),
            'edit' => EditReportList::route('/{record}/edit'),
        ];
    }
}
