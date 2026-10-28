<?php

namespace App\Filament\Resources\LogPercakapan\Pages;

use App\Filament\Resources\LogPercakapan\LogPercakapanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLogPercakapans extends ListRecords
{
    protected static string $resource = LogPercakapanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
