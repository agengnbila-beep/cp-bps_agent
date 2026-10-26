<?php

namespace App\Filament\Resources\KnowledgeSources\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class KnowledgeSourceForm
{
    public static function configure(
        Schema $schema,
        string $category = 'paragraf'
    ): Schema {
        $isTable = $category === 'tabel';

        return $schema
            ->components([
                Hidden::make('data_category')
                    ->default($category)
                    ->dehydrated(),

                Hidden::make('type')
                    ->default($isTable ? 'file' : 'text')
                    ->dehydrated(),

                Section::make(
                    $isTable
                        ? 'Informasi Data Tabel'
                        : 'Informasi Data Paragraf'
                )
                    ->description(
                        $isTable
                            ? 'Unggah file tabel yang akan digunakan oleh AI Agent.'
                            : 'Masukkan informasi berbentuk teks atau paragraf untuk AI Agent.'
                    )
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul Sumber')
                            ->required()
                            ->maxLength(255),

                        Textarea::make('description')
                            ->label('Deskripsi')
                            ->rows(3)
                            ->columnSpanFull(),

                        Textarea::make('content')
                            ->label('Isi Paragraf')
                            ->helperText(
                                'Masukkan informasi yang ingin dijadikan sumber data AI.'
                            )
                            ->rows(8)
                            ->required()
                            ->visible(fn (): bool => ! $isTable)
                            ->columnSpanFull(),

                       FileUpload::make('file_path')
                        ->label('File Data Tabel')
                        ->storeFileNamesIn('original_filename')
                        ->helperText(
                            'Format yang didukung: CSV, XLS, dan XLSX. Maksimal 10 MB.'
                        )
                        ->disk('local')
                        ->directory('knowledge-sources')
                        ->visibility('private')
                        ->acceptedFileTypes([
                            'text/csv',
                            'application/vnd.ms-excel',
                            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                        ])
                        ->maxSize(10240)
                        ->required()
                        ->visible(fn (): bool => $isTable)
                        ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}
