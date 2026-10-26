<?php

namespace App\Filament\Resources\DataTabels\Pages;

use App\Filament\Resources\DataTabels\DataTabelResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Actions\Action;

class ViewDataTabel extends ViewRecord
{
    protected static string $resource = DataTabelResource::class;

    public function infolist(Schema $schema): Schema
    {
        return $schema
            ->record($this->getRecord())
            ->components([
                Section::make('Informasi Data Tabel')
                    ->description('Detail sumber data tabel untuk AI Agent.')
                    ->headerActions([
                        EditAction::make('editData')
                            ->label('Edit')
                            ->color('primary'),

                        DeleteAction::make('hapusData')
                            ->label('Hapus')
                            ->color('danger'),
                    ])
                    ->schema([
                        TextEntry::make('title')
                            ->label('Judul Sumber'),

                        TextEntry::make('description')
                            ->label('Deskripsi')
                            ->placeholder('Tidak ada deskripsi')
                            ->columnSpanFull(),

                        TextEntry::make('original_filename')
                            ->label('Nama File')
                            ->placeholder('Tidak ada file'),

                        TextEntry::make('file_path')
                            ->label('Lokasi File')
                            ->placeholder('Tidak ada file')
                            ->copyable()
                            ->columnSpanFull(),

                        TextEntry::make('created_at')
                            ->label('Tanggal Ditambahkan')
                            ->dateTime('d M Y, H:i'),

                        TextEntry::make('updated_at')
                            ->label('Terakhir Diperbarui')
                            ->dateTime('d M Y, H:i'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('kembali')
            ->label('Kembali')
            ->icon('heroicon-o-arrow-left')
            ->color('gray')
            ->url(DataTabelResource::getUrl('index')),
        ];
    }
}