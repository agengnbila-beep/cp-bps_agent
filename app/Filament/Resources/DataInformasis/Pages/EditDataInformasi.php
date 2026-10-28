<?php

namespace App\Filament\Resources\DataInformasis\Pages;

use App\Filament\Resources\DataInformasis\DataInformasiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDataInformasi extends EditRecord
{
    protected static string $resource = DataInformasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
