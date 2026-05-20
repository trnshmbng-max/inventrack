<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
            TextInput::make('nama_kategori')
                ->label('Nama Kategori')
                ->placeholder('Contoh: Elektronik, Furniture, ATK')
                ->required()
                ->maxLength(255),

            Textarea::make('deskripsi')
                ->label('Deskripsi Kategori')
                ->placeholder('Jelaskan singkat tentang kategori ini')
                ->required()
                ->rows(3),

            FileUpload::make('image')
                ->image()
                ->disk('public')
                ->directory('categories')
                ->required(),
        ]);
}
    
    }

