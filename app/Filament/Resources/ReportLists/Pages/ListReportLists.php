<?php

namespace App\Filament\Resources\ReportLists\Pages;

use App\Filament\Resources\ReportLists\ReportListResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListReportLists extends ListRecords
{
    protected static string $resource = ReportListResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
