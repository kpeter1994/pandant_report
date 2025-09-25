<?php

namespace App\Filament\Resources\TrafficEvents\Pages;

use App\Filament\Resources\TrafficEvents\TrafficEventResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTrafficEvents extends ListRecords
{
    protected static string $resource = TrafficEventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
