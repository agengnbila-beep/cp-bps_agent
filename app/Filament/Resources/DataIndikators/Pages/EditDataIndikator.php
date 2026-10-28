<?php

namespace App\Filament\Resources\DataIndikators\Pages;

use App\Filament\Resources\DataIndikators\DataIndikatorResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDataIndikator extends EditRecord
{
    protected static string $resource = DataIndikatorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
