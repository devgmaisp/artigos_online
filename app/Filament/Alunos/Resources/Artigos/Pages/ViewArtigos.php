<?php

namespace App\Filament\Alunos\Resources\Artigos\Pages;

use App\Filament\Alunos\Resources\Artigos\ArtigosResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewArtigos extends ViewRecord
{
    protected static string $resource = ArtigosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
