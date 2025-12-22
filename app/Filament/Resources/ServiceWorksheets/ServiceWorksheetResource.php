<?php

namespace App\Filament\Resources\ServiceWorksheets;

use App\Filament\Resources\ServiceWorksheets\Pages\CreateServiceWorksheet;
use App\Filament\Resources\ServiceWorksheets\Pages\EditServiceWorksheet;
use App\Filament\Resources\ServiceWorksheets\Pages\ListServiceWorksheets;
use App\Filament\Resources\ServiceWorksheets\Schemas\ServiceWorksheetForm;
use App\Filament\Resources\ServiceWorksheets\Tables\ServiceWorksheetsTable;
use App\Models\ServiceWorksheet;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ServiceWorksheetResource extends Resource
{
    protected static ?string $model = ServiceWorksheet::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Wrench;

    public static function getPluralLabel(): string
    {
        return 'Szerviz munkalapok';
    }

    public static function form(Schema $schema): Schema
    {
        return ServiceWorksheetForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ServiceWorksheetsTable::configure($table);
    }

    public static function getEloquentQuery(): Builder
    {
        $user = auth()->user();

        $query = parent::getEloquentQuery()
            ->orderBy('created_at', 'desc');

        if ($user->role->name === 'Admin') {
            return $query;
        }

        return $query->whereHas('bus', function ($query) use ($user) {
            $query->where('site_id', $user->site_id);
        });
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
            'index' => ListServiceWorksheets::route('/'),
            'create' => CreateServiceWorksheet::route('/create'),
            'edit' => EditServiceWorksheet::route('/{record}/edit'),
        ];
    }
}
