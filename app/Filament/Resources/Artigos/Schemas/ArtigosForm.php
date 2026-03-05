<?php

namespace App\Filament\Resources\Artigos\Schemas;

use Filament\Schemas\Schema;

class ArtigosForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\TextInput::make('titulo')->label('Título')->required(),
                \Filament\Forms\Components\RichEditor::make('conteudo')->label('Conteúdo')->required(),
                \Filament\Forms\Components\FileUpload::make('file_path')->label('Arquivo')->directory('artigos')->preserveFilenames(),
                \Filament\Forms\Components\Select::make('status')->label('Status')
                    ->options([
                        'rascunho' => 'Rascunho',
                        'aguardando' => 'Aguardando',
                        'publicado' => 'Publicado',
                    ])->required(),
                \Filament\Forms\Components\Toggle::make('active')->label('Ativo'),
                \Filament\Forms\Components\Select::make('user_id')->label('Autor')
                    ->relationship('user', 'name')->searchable()->required(),
            ]);
    }
}
