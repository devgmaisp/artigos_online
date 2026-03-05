<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\TextInput::make('name')->label('Name')->required(),
                \Filament\Forms\Components\TextInput::make('email')->label('Email')->email()->required(),
                \Filament\Forms\Components\Toggle::make('is_admin')->label('Admin'),
                \Filament\Forms\Components\Toggle::make('active')->label('Active'),
                \Filament\Forms\Components\Toggle::make('aluno')->label('Aluno'),
            ]);
    }
}
