<?php

namespace App\Filament\Widgets;

use App\Models\LogPercakapan;
use Filament\Actions;
use Filament\Forms;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class RecentChats extends BaseWidget
{
    protected static ?string $heading = 'Pesan Terakhir Masuk';
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(LogPercakapan::query()->latest('created_at'))
            ->columns([
                Tables\Columns\TextColumn::make('created_at')->label('Waktu')->dateTime('d M Y H:i'),
                Tables\Columns\TextColumn::make('sender')->label('Nomor WA'),
                Tables\Columns\TextColumn::make('pushname')->label('Nama'),
                Tables\Columns\TextColumn::make('user_message')->label('Pertanyaan')->limit(50),
                Tables\Columns\TextColumn::make('kategori_permintaan')
                    ->badge()
                    ->color(fn (?string $state): string => match ($state) {
                        'Tidak Terjawab' => 'danger',
                        'Data Statistik' => 'success',
                        default => 'gray',
                    })->label('Kategori'),
            ])
            ->actions([
                Actions\Action::make('Lihat Detail')
                    ->icon('heroicon-m-eye')
                    ->modalHeading('Detail Percakapan')
                    ->modalSubmitAction(false)
                    ->modalCancelActionLabel('Tutup')
                    ->form([
                        Forms\Components\TextInput::make('sender')->label('Nomor WA')->disabled(),
                        Forms\Components\TextInput::make('pushname')->label('Nama')->disabled(),
                        Forms\Components\Textarea::make('user_message')->label('Pertanyaan Pengguna')->disabled()->rows(3),
                        Forms\Components\Textarea::make('agent_reply')->label('Balasan Agent')->disabled()->rows(5),
                    ])
                    ->fillForm(fn (LogPercakapan $record): array => [
                        'sender' => $record->sender,
                        'pushname' => $record->pushname,
                        'user_message' => $record->user_message,
                        'agent_reply' => $record->agent_reply,
                    ]),
            ]);
    }
}