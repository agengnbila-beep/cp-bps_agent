<?php

namespace App\Filament\Resources\DataTabels;

use App\Filament\Resources\DataTabels\Pages\CreateDataTabel;
use App\Filament\Resources\DataTabels\Pages\EditDataTabel;
use App\Filament\Resources\DataTabels\Pages\ListDataTabels;
use App\Filament\Resources\DataTabels\Pages\ViewDataTabel;
use App\Filament\Resources\KnowledgeSources\Schemas\KnowledgeSourceForm;
// use App\Filament\Resources\KnowledgeSources\Schemas\KnowledgeSourceInfolist;
use App\Filament\Resources\KnowledgeSources\Tables\KnowledgeSourcesTable;
use App\Models\KnowledgeSource;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use UnitEnum;

class DataTabelResource extends Resource
{
    protected static ?string $model = KnowledgeSource::class;

    protected static string|UnitEnum|null $navigationGroup = 'Sumber Data';

    protected static ?string $navigationLabel = 'Data Tabel';

    protected static ?string $modelLabel = 'Data Tabel';

    protected static ?string $pluralModelLabel = 'Data Tabel';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'title';

    protected static string|BackedEnum|null $navigationIcon = null;

    public static function form(Schema $schema): Schema
    {
        return KnowledgeSourceForm::configure($schema, 'tabel');
    }

    // public static function infolist(Schema $schema): Schema
    // {
    //     return KnowledgeSourceInfolist::configure($schema);
    // }

    public static function table(Table $table): Table
    {
        return KnowledgeSourcesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDataTabels::route('/'),
            'create' => CreateDataTabel::route('/create'),
            'view' => ViewDataTabel::route('/{record}'),
            'edit' => EditDataTabel::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('data_category', KnowledgeSource::CATEGORY_TABEL);
    }
}
