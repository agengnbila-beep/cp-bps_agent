<?php

namespace App\Filament\Resources\DataIndikators;

use App\Filament\Resources\DataIndikators\Pages;
use App\Models\DataIndikator;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions;
class DataIndikatorResource extends Resource
{
    protected static ?string $model = DataIndikator::class;
    protected static string | \UnitEnum | null $navigationGroup = 'Data';

    protected static ?int $navigationSort = 3;
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\Select::make('indikator_id')
                    ->relationship('indikator', 'nama')
                    ->required()
                    ->searchable(),
                Forms\Components\Select::make('wilayah_id')
                    ->relationship('wilayah', 'nama')
                    ->required()
                    ->searchable(),
                Forms\Components\TextInput::make('periode')
                    ->required()
                    ->maxLength(20)
                    ->placeholder('Contoh: 2024'),
                Forms\Components\TextInput::make('periode_tipe')
                    ->default('tahunan')
                    ->required(),
                Forms\Components\TextInput::make('nilai')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('sumber')
                    ->maxLength(255)
                    ->placeholder('Contoh: BPS, Proyeksi Penduduk'),
                Forms\Components\Toggle::make('is_published')
                    ->label('Dipublikasikan?')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('indikator.nama')->label('Indikator')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('wilayah.nama')->label('Wilayah')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('periode')->sortable(),
                Tables\Columns\TextColumn::make('nilai')->numeric()->sortable(),
                Tables\Columns\IconColumn::make('is_published')
                    ->boolean()
                    ->label('Publik?'),
            ])
            ->actions([
               Actions\EditAction::make()
            ])
            ->bulkActions([
                Actions\BulkActionGroup::make([
                    Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDataIndikators::route('/'),
            'create' => Pages\CreateDataIndikator::route('/create'),
            'edit' => Pages\EditDataIndikator::route('/{record}/edit'),
        ];
    }
}