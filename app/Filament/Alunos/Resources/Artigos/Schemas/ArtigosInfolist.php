<?php

namespace App\Filament\Alunos\Resources\Artigos\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\FileEntry;
use Filament\Schemas\Schema;

class ArtigosInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('titulo'),
                TextEntry::make('conteudo')
                    ->columnSpanFull(),
                FileEntry::make('file_path')
                    ->placeholder('-'),
                TextEntry::make('user_id')
                    ->numeric(),
                TextEntry::make('matricula')
                    ->placeholder('-'),
                IconEntry::make('active')
                    ->boolean(),
                TextEntry::make('status'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
