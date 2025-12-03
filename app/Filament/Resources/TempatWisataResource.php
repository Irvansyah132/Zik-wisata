<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TempatWisataResource\Pages;
use App\Models\TempatWisata;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;

class TempatWisataResource extends Resource
{
    protected static ?string $model = TempatWisata::class;
    protected static ?string $navigationIcon = 'heroicon-o-map-pin';
    protected static ?string $navigationGroup = 'Data Wisata';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_tempat')
                    ->required(),

                Forms\Components\Textarea::make('deskripsi')
                    ->maxLength(1000),

                Forms\Components\Select::make('kategori_id')
                    ->relationship('kategori', 'nama_kategori')
                    ->required(),

                Forms\Components\Select::make('kota_id')
                    ->relationship('kota', 'nama_kota')
                    ->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_tempat'),
                Tables\Columns\TextColumn::make('kategori.nama_kategori')
                    ->label('Kategori'),
                Tables\Columns\TextColumn::make('kota.nama_kota')
                    ->label('Kota'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTempatWisatas::route('/'),
            'create' => Pages\CreateTempatWisata::route('/create'),
            'edit' => Pages\EditTempatWisata::route('/{record}/edit'),
        ];
    }
}
