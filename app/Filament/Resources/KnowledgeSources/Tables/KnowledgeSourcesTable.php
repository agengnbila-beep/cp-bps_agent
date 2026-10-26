<?php

namespace App\Filament\Resources\KnowledgeSources\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class KnowledgeSourcesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Sumber Data')
                    ->description(
                        fn ($record): string =>
                            str($record->description ?: 'Tidak ada deskripsi')
                                ->limit(65)
                                ->toString()
                    )
                    ->weight('bold')
                    ->color('primary')
                    ->searchable()
                    ->sortable()
                    ->wrap(),

                TextColumn::make('type')
                    ->label('Jenis Data')
                    ->badge()
                    ->icon(fn (?string $state): string => match ($state) {
                        'file' => 'heroicon-o-document-chart-bar',
                        'text' => 'heroicon-o-document-text',
                        default => 'heroicon-o-document',
                    })
                    ->formatStateUsing(
                        fn (?string $state): string => match ($state) {
                            'file' => 'File Tabel',
                            'text' => 'Paragraf',
                            default => '-',
                        }
                    )
                    ->color(fn (?string $state): string => match ($state) {
                        'file' => 'info',
                        'text' => 'success',
                        default => 'gray',
                    }),

                TextColumn::make('created_at')
                    ->label('Ditambahkan')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->color('gray'),
            ])
            ->filters([])
            ->recordActions([
                ViewAction::make()
                    ->label('Detail')
                    ->button()
                    ->color('primary')
                    ->icon('heroicon-o-eye'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->striped();
    }
}
