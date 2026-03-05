<?php

namespace App\Filament\Alunos\Resources\Artigos\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ArtigosForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('titulo')
                    ->required(),
                Textarea::make('conteudo')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('file_path'),
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                TextInput::make('matricula'),
                Toggle::make('active')
                    ->required(),
                TextInput::make('status')
                    ->required()
                    ->default('rascunho'),
            ]);
    }
}
