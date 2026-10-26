<?php

namespace App\Filament\Resources\DataTabels\Pages;

use App\Filament\Resources\DataTabels\DataTabelResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;

class CreateDataTabel extends CreateRecord
{
    protected static string $resource = DataTabelResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['data_category'] = 'tabel';
        $data['type'] = 'file';

        if (! empty($data['file_path'])) {
            $disk = Storage::disk('local');
            $path = $data['file_path'];

            if ($disk->exists($path)) {
                $data['mime_type'] = $disk->mimeType($path);
                $data['file_size'] = $disk->size($path);
            }
        }

        return $data;
    }
}
