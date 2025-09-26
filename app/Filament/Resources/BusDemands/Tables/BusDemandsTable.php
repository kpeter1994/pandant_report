<?php

namespace App\Filament\Resources\BusDemands\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BusDemandsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('dailyReport.report_date')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('site.name')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('busType.name')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('garden')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('got')
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
