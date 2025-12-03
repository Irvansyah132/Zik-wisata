<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KategoriWisataResource\Pages;
use App\Models\KategoriWisata;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;

class KategoriWisataResource extends Resource
{
    protected static ?string $model = KategoriWisata::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Master Data';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_kategori')
                    ->required()
                    ->maxLength(100),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('nama_kategori'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKategoriWisatas::route('/'),
            'create' => Pages\CreateKategoriWisata::route('/create'),
            'edit' => Pages\EditKategoriWisata::route('/{record}/edit'),
        ];
    }
}
