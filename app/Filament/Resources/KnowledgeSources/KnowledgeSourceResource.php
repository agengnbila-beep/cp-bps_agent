<?php

namespace App\Filament\Resources\KnowledgeSources;

use App\Filament\Resources\KnowledgeSources\Pages\CreateKnowledgeSource;
use App\Filament\Resources\KnowledgeSources\Pages\EditKnowledgeSource;
use App\Filament\Resources\KnowledgeSources\Pages\ListKnowledgeSources;
use App\Filament\Resources\KnowledgeSources\Schemas\KnowledgeSourceForm;
use App\Filament\Resources\KnowledgeSources\Tables\KnowledgeSourcesTable;
use App\Models\KnowledgeSource;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class KnowledgeSourceResource extends Resource
{
    // Model database sumber data
    protected static ?string $model = KnowledgeSource::class;

    // Label Resource lama tetap dipertahankan
    protected static ?string $navigationLabel = 'Sumber Data';

    protected static ?string $modelLabel = 'Sumber Data';

    protected static ?string $pluralModelLabel = 'Sumber Data';

    // Icon sumber data
    protected static string|BackedEnum|null $navigationIcon =
        Heroicon::OutlinedCircleStack;

    // Kolom judul sumber data
    protected static ?string $recordTitleAttribute = 'title';

    // Sembunyikan menu lama dari sidebar.
    // Resource tetap dapat digunakan oleh halaman lain.
    protected static bool $shouldRegisterNavigation = false;  
      
    // Form tambah/edit sumber data
    public static function form(Schema $schema): Schema
    {
        return KnowledgeSourceForm::configure($schema);
    }

    // Tabel daftar sumber data
    public static function table(Table $table): Table
    {
        return KnowledgeSourcesTable::configure($table);
    }

    // Relasi model
    public static function getRelations(): array
    {
        return [];
    }

    // Halaman Resource
    public static function getPages(): array
    {
        return [
            'index' => ListKnowledgeSources::route('/'),
            'create' => CreateKnowledgeSource::route('/create'),
            'edit' => EditKnowledgeSource::route('/{record}/edit'),
        ];
    }
}
