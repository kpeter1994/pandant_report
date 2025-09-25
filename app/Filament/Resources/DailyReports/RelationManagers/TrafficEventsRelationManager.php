<?php

namespace App\Filament\Resources\DailyReports\RelationManagers;

use App\Filament\Resources\TrafficEvents\TrafficEventResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class TrafficEventsRelationManager extends RelationManager
{
    protected static string $relationship = 'trafficEvents';

    protected static ?string $relatedResource = TrafficEventResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
