<?php

namespace App\Filament\Resources\BusDemands\Pages;

use App\Filament\Resources\BusDemands\BusDemandResource;
use App\Models\DailyReport;
use Carbon\Carbon;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateBusDemand extends CreateRecord
{
    protected static string $resource = BusDemandResource::class;



    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['daily_report_id'] = DailyReport::where('is_active', true)->first()->id;


        return $data;
    }


    public function mount(): void
    {
        parent::mount();

        $startDate = Carbon::create(2025, 12, 28);
        $endDate = $startDate->copy()->addDays(14);

        if (now()->between($startDate, $endDate)) {
            Notification::make()
                ->title('Figyelem!')
                ->body('Kérlek ellenőrizd az adatokat! A mentés előtt győződj meg róla, hogy a napi tényleges igény és a szerződés szerinti igény helyesen van megadva.')
                ->warning()
                ->persistent()
                ->actions([
                    Action::make('elfogad')
                        ->label('Tudomásul vettem')
                        ->button()
                        ->close(),
                ])
                ->send();
        }
    }
}
