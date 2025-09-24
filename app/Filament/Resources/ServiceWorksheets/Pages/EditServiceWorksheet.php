<?php

namespace App\Filament\Resources\ServiceWorksheets\Pages;

use App\Filament\Resources\ServiceWorksheets\ServiceWorksheetResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditServiceWorksheet extends EditRecord
{
    protected static string $resource = ServiceWorksheetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
