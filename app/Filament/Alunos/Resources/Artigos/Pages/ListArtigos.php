<?php

namespace App\Filament\Alunos\Resources\Artigos\Pages;

use App\Filament\Alunos\Resources\Artigos\ArtigosResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListArtigos extends ListRecords
{
    protected static string $resource = ArtigosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
