<?php

namespace App\Filament\Resources\DataParagrafs;

use App\Filament\Resources\DataParagrafs\Pages\CreateDataParagraf;
use App\Filament\Resources\DataParagrafs\Pages\EditDataParagraf;
use App\Filament\Resources\DataParagrafs\Pages\ListDataParagrafs;
use App\Filament\Resources\DataParagrafs\Pages\ViewDataParagraf;
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

class DataParagrafResource extends Resource
{
    protected static ?string $model = KnowledgeSource::class;

    protected static string|UnitEnum|null $navigationGroup = 'Sumber Data';

    protected static ?string $navigationLabel = 'Data Paragraf';

    protected static ?string $modelLabel = 'Data Paragraf';

    protected static ?string $pluralModelLabel = 'Data Paragraf';

    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'title';

    protected static string|BackedEnum|null $navigationIcon = null;

    public static function form(Schema $schema): Schema
    {
        return KnowledgeSourceForm::configure($schema, 'paragraf');
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
            'index' => ListDataParagrafs::route('/'),
            'create' => CreateDataParagraf::route('/create'),
            'view' => ViewDataParagraf::route('/{record}'),
            'edit' => EditDataParagraf::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('data_category', KnowledgeSource::CATEGORY_PARAGRAF);
    }
}
