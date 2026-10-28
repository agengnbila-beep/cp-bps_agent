<?php

namespace App\Filament\Resources\Wilayahs;

use App\Filament\Resources\Wilayahs\Pages;
use App\Models\Wilayah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions; // <--- WAJIB ADA

class WilayahResource extends Resource
{
    protected static ?string $model = Wilayah::class;
    
    protected static string | \UnitEnum | null $navigationGroup = 'Data';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Wilayah';
    protected static ?string $modelLabel = 'Wilayah';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('level')
                    ->options([
                        'provinsi' => 'Provinsi',
                        'kabkota' => 'Kabupaten/Kota',
                        'kecamatan' => 'Kecamatan',
                        'desa' => 'Desa',
                    ])
                    ->required(),
                Forms\Components\Toggle::make('is_published')
                    ->label('Dipublikasikan?')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->searchable(),
                Tables\Columns\TextColumn::make('level')->label('Tingkat'),
                Tables\Columns\IconColumn::make('is_published')
                    ->boolean()
                    ->label('Publik?'),
            ])
            ->actions([
                Actions\EditAction::make(),
                Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Actions\BulkActionGroup::make([
                    Actions\DeleteBulkAction::make(),
                ]),
            ]); // <--- Perhatikan titik koma di sini
    } // <--- Ini kurung kurawal penutup fungsi table() yang tadi hilang

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWilayahs::route('/'),
            'create' => Pages\CreateWilayah::route('/create'),
            'edit' => Pages\EditWilayah::route('/{record}/edit'),
        ];
    }
}