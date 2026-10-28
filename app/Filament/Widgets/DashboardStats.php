<?php

namespace App\Filament\Widgets;

use App\Models\Indikator;
use App\Models\Wilayah;
use App\Models\DataIndikator;
use App\Models\PertanyaanTakTerjawab;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $totalIndikator = Indikator::count();
        $totalWilayah = Wilayah::count();
        $totalData = DataIndikator::count();
        $totalTidakTerjawab = PertanyaanTakTerjawab::count();

        return [
            Stat::make('Total Indikator', $totalIndikator)
                ->description('Indikator statistik terdaftar')
                ->descriptionIcon('heroicon-o-list-bullet')
                ->color('primary'),

            Stat::make('Total Wilayah', $totalWilayah)
                ->description('Wilayah administratif')
                ->descriptionIcon('heroicon-o-map')
                ->color('info'),

            Stat::make('Total Data', $totalData)
                ->description('Baris data statistik')
                ->descriptionIcon('heroicon-o-table-cells')
                ->color('success'),

            Stat::make('Pertanyaan Tak Terjawab', $totalTidakTerjawab)
                ->description('Pertanyaan dari WhatsApp')
                ->descriptionIcon('heroicon-o-chat-bubble-left-right')
                ->color('danger'),
        ];
    }
}