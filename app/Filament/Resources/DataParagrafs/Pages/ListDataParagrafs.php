<?php

namespace App\Filament\Resources\DataParagrafs\Pages;

use App\Filament\Resources\DataParagrafs\DataParagrafResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDataParagrafs extends ListRecords
{
    protected static string $resource = DataParagrafResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
