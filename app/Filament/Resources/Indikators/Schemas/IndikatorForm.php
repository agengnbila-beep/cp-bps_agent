<?php

namespace App\Filament\Resources\Indikators\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class IndikatorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Textarea::make('nama')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('sinonim')
                    ->required()
                    ->default('{}'),
                Textarea::make('satuan')
                    ->columnSpanFull(),
                Textarea::make('deskripsi')
                    ->columnSpanFull(),
                Toggle::make('is_published')
                    ->required(),
            ]);
    }
}
