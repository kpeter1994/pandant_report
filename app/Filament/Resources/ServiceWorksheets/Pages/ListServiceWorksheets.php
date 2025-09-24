<?php

namespace App\Filament\Resources\ServiceWorksheets\Pages;

use App\Filament\Resources\ServiceWorksheets\ServiceWorksheetResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListServiceWorksheets extends ListRecords
{
    protected static string $resource = ServiceWorksheetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
