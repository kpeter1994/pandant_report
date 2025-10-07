<?php

namespace App\Filament\Resources\ReportLists\Pages;

use App\Filament\Resources\ReportLists\ReportListResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditReportList extends EditRecord
{
    protected static string $resource = ReportListResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
