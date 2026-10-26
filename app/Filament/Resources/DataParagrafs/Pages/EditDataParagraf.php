<?php

namespace App\Filament\Resources\DataParagrafs\Pages;

use App\Filament\Resources\DataParagrafs\DataParagrafResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDataParagraf extends EditRecord
{
    protected static string $resource = DataParagrafResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
