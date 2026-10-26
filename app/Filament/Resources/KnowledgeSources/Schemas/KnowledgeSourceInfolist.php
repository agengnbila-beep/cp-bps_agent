<?php

namespace App\Filament\Resources\KnowledgeSources\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class KnowledgeSourceInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextEntry::make('title')
                ->label('Judul Sumber'),
        ]);
    }
}