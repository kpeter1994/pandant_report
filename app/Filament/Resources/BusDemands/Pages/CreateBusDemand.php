<?php

namespace App\Filament\Resources\BusDemands\Pages;

use App\Filament\Resources\BusDemands\BusDemandResource;
use App\Models\DailyReport;
use Filament\Resources\Pages\CreateRecord;

class CreateBusDemand extends CreateRecord
{
    protected static string $resource = BusDemandResource::class;



    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['daily_report_id'] = DailyReport::where('is_active', true)->first()->id;


        return $data;
    }
}
