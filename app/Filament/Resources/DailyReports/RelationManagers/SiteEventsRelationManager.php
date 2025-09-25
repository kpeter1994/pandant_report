<?php

namespace App\Filament\Resources\DailyReports\RelationManagers;

use App\Filament\Resources\SiteEvents\SiteEventResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class SiteEventsRelationManager extends RelationManager
{
    protected static string $relationship = 'siteEvents';

    protected static ?string $relatedResource = SiteEventResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
