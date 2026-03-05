<?php

namespace App\Filament\Alunos\Resources\Artigos;

use App\Filament\Alunos\Resources\Artigos\Pages\CreateArtigos;
use App\Filament\Alunos\Resources\Artigos\Pages\EditArtigos;
use App\Filament\Alunos\Resources\Artigos\Pages\ListArtigos;
use App\Filament\Alunos\Resources\Artigos\Pages\ViewArtigos;
use App\Filament\Alunos\Resources\Artigos\Schemas\ArtigosForm;
use App\Filament\Alunos\Resources\Artigos\Schemas\ArtigosInfolist;
use App\Filament\Alunos\Resources\Artigos\Tables\ArtigosTable;
use App\Models\Artigos;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ArtigosResource extends Resource
{
    protected static ?string $model = Artigos::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'titulo';

    public static function form(Schema $schema): Schema
    {
        return ArtigosForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ArtigosInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ArtigosTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListArtigos::route('/'),
            'create' => CreateArtigos::route('/create'),
            'view' => ViewArtigos::route('/{record}'),
            'edit' => EditArtigos::route('/{record}/edit'),
        ];
    }
}
