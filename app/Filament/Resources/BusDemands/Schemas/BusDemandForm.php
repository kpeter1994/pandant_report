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
                    ->label('Leadott igény')
                    ->numeric(),
                TextInput::make('got')
                    ->label('Kiadott jármű')
                    ->required()
                    ->numeric()
                    ->live(debounce: 800)
                    ->afterStateUpdated(function ($state, $get) {

                        if ($state < $get('garden')) {
                            Notification::make()
                                ->title('Figyelmeztetés')
                                ->body('A kiadott járművek száma kisebb, mint a leadott igény.')
                                ->persistent()
                                ->warning()
                                ->send();
                        }

                        if (self::biggerThanStock($get('site_id'), $get('bus_types_id'), $state)) {
                            Notification::make()
                                ->title('Hiba')
                                ->body('A kiadott járművek száma meghaladja a forgalomképes járművek számát a telephelyen. Kérem ellenőrizze a Szerviz munkalapoknál a javítás alatt álló járműveket.')
                                ->persistent()
                                ->danger()
                                ->send();
                        }
                    }),
            ]);
    }
}
