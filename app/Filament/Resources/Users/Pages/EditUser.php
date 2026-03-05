<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\Action::make('activate')
                ->label('Activate')
                ->visible(fn($record) => !$record->active)
                ->action(function ($record) {
                    $record->active = true;
                    $record->save();
                    $this->notify('success', 'User activated.');
                }),
            \Filament\Actions\Action::make('block')
                ->label('Block')
                ->color('danger')
                ->visible(fn($record) => $record->active)
                ->action(function ($record) {
                    $record->active = false;
                    $record->save();
                    $this->notify('success', 'User blocked.');
                }),
            DeleteAction::make(),
        ];
    }
}
