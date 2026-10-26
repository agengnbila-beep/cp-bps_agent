<?php

namespace App\Filament\Resources\KnowledgeSources\Schemas;

use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class KnowledgeSourceInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Sumber Data')
                    ->headerActions([
                        Action::make('edit')
                            ->label('Edit')
                            ->icon('heroicon-o-pencil-square')
                            ->color('primary')
                            ->url(fn ($livewire, $record): string =>
                                $livewire::getResource()::getUrl(
                                    'edit',
                                    ['record' => $record]
                                )
                            ),

                        DeleteAction::make('delete')
                            ->label('Hapus')
                            ->icon('heroicon-o-trash')
                            ->record(fn ($record) => $record)
                            ->successRedirectUrl(fn ($livewire): string =>
                                $livewire::getResource()::getUrl('index')
                            ),
                    ])
                    ->schema([
                        TextEntry::make('title')
                            ->label('Judul Sumber'),

                        TextEntry::make('type')
                            ->label('Jenis Sumber')
                            ->formatStateUsing(
                                fn (?string $state): string => match ($state) {
                                    'file' => 'Unggah File',
                                    'text' => 'Input Teks',
                                    default => '-',
                                }
                            ),

                        TextEntry::make('description')
                            ->label('Deskripsi')
                            ->placeholder('Tidak ada deskripsi')
                            ->columnSpanFull(),

                        TextEntry::make('content')
                            ->label('Isi Informasi')
                            ->placeholder('Tidak ada isi teks')
                            ->columnSpanFull()
                            ->visible(
                                fn ($record): bool =>
                                    $record?->type === 'text'
                            ),

                        TextEntry::make('file_path')
                            ->label('Lokasi File')
                            ->placeholder('Tidak ada file')
                            ->copyable()
                            ->columnSpanFull()
                            ->visible(
                                fn ($record): bool =>
                                    $record?->type === 'file'
                            ),

                        TextEntry::make('created_at')
                            ->label('Tanggal Ditambahkan')
                            ->dateTime('d M Y, H:i'),

                        TextEntry::make('updated_at')
                            ->label('Terakhir Diperbarui')
                            ->dateTime('d M Y, H:i'),
                    ])
                    ->columns(2),
            ]);
    }
}
