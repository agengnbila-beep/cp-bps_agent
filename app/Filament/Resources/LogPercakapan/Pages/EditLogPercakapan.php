<?php

namespace App\Filament\Resources\LogPercakapan\Pages;

use App\Filament\Resources\LogPercakapan\LogPercakapanResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditLogPercakapan extends EditRecord
{
    protected static string $resource = LogPercakapanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
