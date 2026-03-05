<?php

namespace App\Filament\Resources\Artigos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

class ArtigosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('titulo')->label('Título')->searchable(),
                \Filament\Tables\Columns\TextColumn::make('status')->label('Status')->badge(),
                \Filament\Tables\Columns\ToggleColumn::make('active')->label('Ativo'),
                \Filament\Tables\Columns\TextColumn::make('user.name')->label('Autor')->searchable(),
            ])
            ->filters([
                \Filament\Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'rascunho' => 'Rascunho',
                        'aguardando' => 'Aguardando',
                        'publicado' => 'Publicado',
                    ])->label('Status'),
                \Filament\Tables\Filters\SelectFilter::make('active')
                    ->options([
                        '1' => 'Ativo',
                        '0' => 'Inativo',
                    ])->label('Ativo'),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
