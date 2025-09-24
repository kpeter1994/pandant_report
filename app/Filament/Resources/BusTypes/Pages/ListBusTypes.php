<?php

namespace App\Filament\Resources\BusTypes\Pages;

use App\Filament\Resources\BusTypes\BusTypesResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBusTypes extends ListRecords
{
    protected static string $resource = BusTypesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
