<?php

namespace App\Filament\Pages;

use App\Models\Indikator;
use Filament\Pages\Page;
use Filament\Actions;

class DataTabel extends Page
{
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-table-cells';
    protected static string | \UnitEnum | null $navigationGroup = 'Data';
    protected static ?string $navigationLabel = 'Data Tabel';
    protected static ?int $navigationSort = 1;
    protected static ?string $title = 'Daftar Data Tabel';

    // PERHATIKAN BARIS INI: TIDAK ADA KATA 'static'
    protected string $view = 'filament.pages.data-tabel';

    public function getIndikators()
    {
        return Indikator::withCount('dataIndikators')->latest()->get();
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('tambah_data')
                ->label('Tambah Data')
                ->icon('heroicon-o-plus')
                ->url(fn (): string => \App\Filament\Resources\Indikators\IndikatorResource::getUrl('create'))
                ->color('primary'),
        ];
    }
}