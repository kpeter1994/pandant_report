<?php

namespace App\Filament\Resources\Buses\RelationManagers;

use Filament\Actions\AttachAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DetachAction;
use Filament\Actions\DetachBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ServiceWorksheetsRelationManager extends RelationManager
{
    protected static string $relationship = 'serviceWorksheets';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('service_type_id')
                    ->required()
                    ->relationship('serviceType', 'name'),
                Textarea::make('description')
                    ->columnSpanFull()
                    ->maxLength(255),
                DateTimePicker::make('start'),
                DateTimePicker::make('end'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('description')
            ->columns([
                TextColumn::make('serviceType.name')
                    ->label('Szerviz típus')
                    ->searchable(),
                TextColumn::make('start')
                    ->label('-tól')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('end')
                    ->label('-ig')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('description')
                    ->label('Leírás')
                    ->searchable()
                    ->wrap(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
                AttachAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DetachBulkAction::make(),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
