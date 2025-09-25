<?php

namespace App\Filament\Resources\TrafficEvents\Pages;

use App\Filament\Resources\TrafficEvents\TrafficEventResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTrafficEvent extends EditRecord
{
    protected static string $resource = TrafficEventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
