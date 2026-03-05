<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
            \Filament\Actions\BulkAction::make('activate')
                ->label('Activate Users')
                ->action(fn($records) => $records->each(fn($user) => $user->update(['active' => true])))
                ->deselectRecordsAfterCompletion(),
            \Filament\Actions\BulkAction::make('block')
                ->label('Block Users')
                ->color('danger')
                ->action(fn($records) => $records->each(fn($user) => $user->update(['active' => false])))
                ->deselectRecordsAfterCompletion(),
        ];
    }
}
