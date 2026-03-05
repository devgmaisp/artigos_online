<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('name')->label('Name')->searchable(),
                \Filament\Tables\Columns\TextColumn::make('email')->label('Email')->searchable(),
                \Filament\Tables\Columns\IconColumn::make('is_admin')->boolean()->label('Admin'),
                \Filament\Tables\Columns\ToggleColumn::make('active')->label('Active'),
            ])
            ->filters([
                \Filament\Tables\Filters\SelectFilter::make('active')
                    ->options([
                        '1' => 'Active',
                        '0' => 'Inactive',
                    ])
                    ->label('Status'),
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
