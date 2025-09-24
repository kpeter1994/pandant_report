<?php

namespace App\Filament\Resources\BusTypes\Pages;

use App\Filament\Resources\BusTypes\BusTypesResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBusTypes extends EditRecord
{
    protected static string $resource = BusTypesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
