<?php

namespace App\Filament\Resources\Wilayahs\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class WilayahForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Textarea::make('nama')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('level')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('kode_bps')
                    ->columnSpanFull(),
                Toggle::make('is_published')
                    ->required(),
            ]);
    }
}
