<?php

namespace App\Filament\Resources\Items\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Hidden;

class ItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
            TextInput::make('nama_barang')
                ->label('Nama Barang')
                ->placeholder('Contoh: Laptop Lenovo ThinkPad')
                ->required()
                ->maxLength(255),

            TextInput::make('kode_barang')
                ->label('Kode Barang')
                ->placeholder('Contoh: BRG-001')
                ->required()
                ->unique(ignoreRecord: true)
                ->maxLength(255),

            TextInput::make('stok')
                ->label('Jumlah Stok')
                ->numeric()
                ->required()
                ->minValue(0),

            TextInput::make('harga')
                ->label('Harga Satuan (Rp)')
                ->numeric()
                ->required()
                ->minValue(0)
                ->prefix('Rp'),

            Select::make('kondisi')
                ->label('Kondisi Barang')
                ->options([
                    'Baik' => 'Baik',
                    'Rusak Ringan' => 'Rusak Ringan',
                    'Rusak Berat' => 'Rusak Berat',
                ])
                ->required(),

            Select::make('lokasi')
                ->label('Lokasi Penyimpanan')
                ->options([
                    'Gudang A' => 'Gudang A',
                    'Gudang B' => 'Gudang B',
                    'Gudang C' => 'Gudang C',
                ])
                ->required(),

            Textarea::make('deskripsi')
                ->label('Deskripsi Barang')
                ->placeholder('Jelaskan detail barang ini')
                ->required()
                ->rows(3),

            FileUpload::make('image')
                ->label('Foto Barang')
                ->image()
                ->disk('public')
                ->directory('items')
                ->visibility('public'),

            Hidden::make('users_id'),
            ]);
    }
}
