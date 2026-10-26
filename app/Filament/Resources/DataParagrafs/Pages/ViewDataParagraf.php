<?php

namespace App\Filament\Resources\DataParagrafs\Pages;

use App\Filament\Resources\DataParagrafs\DataParagrafResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Actions\Action;

class ViewDataParagraf extends ViewRecord
{
    protected static string $resource = DataParagrafResource::class;

    public function infolist(Schema $schema): Schema
    {
        return $schema
            ->record($this->getRecord())
            ->components([
                Section::make('Informasi Data Paragraf')
                    ->description('Detail sumber data paragraf untuk AI Agent.')
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

                        TextEntry::make('content')
                            ->label('Isi Paragraf')
                            ->placeholder('Tidak ada isi paragraf')
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
            ->url(DataParagrafResource::getUrl('index')),
        ];
    }
}