<?php

namespace App\Filament\Resources\LogPercakapan;

use App\Filament\Resources\LogPercakapan\Pages;
use App\Models\LogPercakapan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions;
class LogPercakapanResource extends Resource
{
    protected static ?string $model = LogPercakapan::class;
    protected static bool $shouldRegisterNavigation = false;
    protected static ?string $navigationLabel = 'Log Percakapan';
    protected static ?string $modelLabel = 'Log Percakapan';

    // Sembunyikan tombol Create
    public static function canCreate(): bool
    {
        return false; 
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('sender')->disabled()->label('Nomor WA'),
                Forms\Components\TextInput::make('pushname')->disabled()->label('Nama'),
                Forms\Components\TextInput::make('kategori_permintaan')->disabled()->label('Kategori'),
                Forms\Components\Textarea::make('user_message')->disabled()->columnSpanFull()->label('Pertanyaan User'),
                Forms\Components\Textarea::make('agent_reply')->disabled()->columnSpanFull()->label('Balasan Agent'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sender')->searchable()->label('Nomor WA'),
                Tables\Columns\TextColumn::make('pushname')->searchable()->label('Nama'),
                Tables\Columns\TextColumn::make('user_message')->limit(40)->label('Pertanyaan'),
                Tables\Columns\TextColumn::make('kategori_permintaan')
                    ->badge()
                    ->color(fn (?string $state): string => match ($state) {
                        'Tidak Terjawab' => 'danger',
                        'Data Statistik' => 'success',
                        default => 'gray',
                    })->label('Kategori'),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable()->label('Waktu'),
            ])
            ->actions([
                Actions\EditAction::make()->label('Lihat Detail'), 
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLogPercakapans::route('/'),
            'edit' => Pages\EditLogPercakapan::route('/{record}/edit'),
        ];
    }
}