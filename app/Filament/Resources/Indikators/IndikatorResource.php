<?php

namespace App\Filament\Resources\Indikators;

use App\Filament\Resources\Indikators\Pages;
use App\Models\Indikator;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions;

class IndikatorResource extends Resource
{
    protected static ?string $model = DataIndikator::class;
    protected static string | \UnitEnum | null $navigationGroup = 'Data';
    protected static ?int $navigationSort = 2;
    protected static bool $shouldRegisterNavigation = false;
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('nama')->required()->maxLength(255),
                Forms\Components\TagsInput::make('sinonim')->placeholder('Ketik lalu tekan Enter'),
                Forms\Components\TextInput::make('satuan')->maxLength(255),
                Forms\Components\Textarea::make('deskripsi')->columnSpanFull(),
                Forms\Components\Toggle::make('is_published')->label('Dipublikasikan?')->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Data')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('deskripsi')
                    ->label('Tentang Data')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Ditambahkan')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->actions([
                Actions\ViewAction::make()
                    ->label('Overview'),
                Actions\EditAction::make(),
            ]);
    }
        public static function getPages(): array
    {
        return [
            'index' => Pages\ListIndikators::route('/'),
            'create' => Pages\CreateIndikator::route('/create'),
            'edit' => Pages\EditIndikator::route('/{record}/edit'), // <-- Pastikan ini ada
        ];
    }
}