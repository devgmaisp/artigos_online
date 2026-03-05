<?php

namespace App\Filament\Alunos\Resources\Artigos\Pages;

use App\Filament\Alunos\Resources\Artigos\ArtigosResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditArtigos extends EditRecord
{
    protected static string $resource = ArtigosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
