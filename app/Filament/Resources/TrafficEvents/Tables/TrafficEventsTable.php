<?php

namespace App\Filament\Resources\TrafficEvents\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TrafficEventsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('dailyReport.report_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('bus.license_plate')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('event_time')
                    ->time()
                    ->sortable(),
                TextColumn::make('damage_value')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('personal_injury')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
