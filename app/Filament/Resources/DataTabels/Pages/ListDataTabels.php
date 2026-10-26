<?php

namespace App\Filament\Resources\DataTabels\Pages;

use App\Filament\Resources\DataTabels\DataTabelResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDataTabels extends ListRecords
{
    protected static string $resource = DataTabelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
