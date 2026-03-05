<?php

namespace App\Filament\Resources\Artigos\Pages;

use App\Filament\Resources\Artigos\ArtigosResource;
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
