<?php

namespace App\Filament\Resources\DataInformasis;

use App\Filament\Resources\DataInformasis\Pages;
use App\Models\DataInformasi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions;
class DataInformasiResource extends Resource
{
    protected static ?string $model = DataInformasi::class;
    protected static string | \UnitEnum | null $navigationGroup = 'Data';
    protected static ?int $navigationSort = 4;
    
    // Mengubah nama menu di sidebar
    protected static ?string $navigationLabel = 'Data Informasi';
    protected static ?string $modelLabel = 'Data Informasi';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('judul')->required()->maxLength(255),
                Forms\Components\RichEditor::make('konten')->required()->columnSpanFull(),
                Forms\Components\Toggle::make('is_published')->label('Dipublikasikan?')->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->label('Nama Data')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('konten')
                    ->label('Tentang Data')
                    ->limit(50)
                    ->html() // Karena RichEditor mengandung HTML
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Ditambahkan')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->actions([
                Actions\ViewAction::make()
                    ->label('Overview')
                    ->color('info'),
                Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDataInformasis::route('/'),
            'create' => Pages\CreateDataInformasi::route('/create'),
            'edit' => Pages\EditDataInformasi::route('/{record}/edit'),
        ];
    }
}