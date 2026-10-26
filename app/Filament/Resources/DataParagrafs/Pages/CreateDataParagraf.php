<?php

namespace App\Filament\Resources\DataParagrafs\Pages;

use App\Filament\Resources\DataParagrafs\DataParagrafResource;
use Filament\Resources\Pages\CreateRecord;

class CreateDataParagraf extends CreateRecord
{
    protected static string $resource = DataParagrafResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['data_category'] = 'paragraf';
        $data['type'] = 'text';

        return $data;
    }
}
