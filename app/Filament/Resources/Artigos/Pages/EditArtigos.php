<?php

namespace App\Filament\Resources\Artigos\Pages;

use App\Filament\Resources\Artigos\ArtigosResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditArtigos extends EditRecord
{
    protected static string $resource = ArtigosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
