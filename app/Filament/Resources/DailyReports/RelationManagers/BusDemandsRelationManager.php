<?php

namespace App\Filament\Resources\DailyReports\RelationManagers;

use App\Filament\Resources\BusDemands\BusDemandResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class BusDemandsRelationManager extends RelationManager
{
    protected static string $relationship = 'busDemands';

    protected static ?string $relatedResource = BusDemandResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
