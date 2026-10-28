<?php

namespace App\Filament\Resources\DataIndikators\Pages;

use App\Filament\Resources\DataIndikators\DataIndikatorResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDataIndikators extends ListRecords
{
    protected static string $resource = DataIndikatorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
