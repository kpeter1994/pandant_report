<?php

namespace App\Filament\Resources\TrafficEvents\Pages;

use App\Filament\Resources\TrafficEvents\TrafficEventResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTrafficEvent extends CreateRecord
{
    protected static string $resource = TrafficEventResource::class;

    public function getTitle(): string
    {
        return 'Új forgalmi esemény';
    }
}
