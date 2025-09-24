<?php

namespace App\Filament\Resources\BusDemands\Pages;

use App\Filament\Resources\BusDemands\BusDemandResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBusDemand extends EditRecord
{
    protected static string $resource = BusDemandResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
