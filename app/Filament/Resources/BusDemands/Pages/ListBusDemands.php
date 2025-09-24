<?php

namespace App\Filament\Resources\BusDemands\Pages;

use App\Filament\Resources\BusDemands\BusDemandResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBusDemands extends ListRecords
{
    protected static string $resource = BusDemandResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
