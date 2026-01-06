<?php

namespace App\Filament\Resources\BusDemands\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Notifications\Notification;
use App\Models\Bus;

class BusDemandForm
{

    public static function biggerThanStock($siteId, $busTypeId, $got)
    {
        $stock = Bus::where('site_id', $siteId)
            ->where('bus_types_id', $busTypeId)->get()->count();

        $serviceWorksheetsCount = Bus::where('site_id', $siteId)
            ->where('bus_types_id', $busTypeId)
            ->whereHas('serviceWorksheets', function ($query) {
                $query->where('open', true);
            })
            ->count();

        if (($stock - $serviceWorksheetsCount -$got) < 0) {
            return true;
        }

        return false;
    }
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('site_id')
                    ->required()
                    ->relationship('site', 'name')
                    ->label('Telephely')
                    ->default(fn () => auth()->user()->site?->id),
                Select::make('bus_types_id')
                    ->required()
                    ->relationship('busType', 'name')
                    ->label('Busz típus'),
                TextInput::make('garden')
                    ->required()
                    ->label('Üzem által kiadott mennyiség (db)')
                    ->numeric(),
                TextInput::make('got')
                    ->label('Napi autóbusz forgalmi igény (db)')
                    ->required()
                    ->numeric()
            ]);
    }
}
