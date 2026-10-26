<?php

namespace App\Filament\Widgets;

use App\Models\KnowledgeSource;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $totalSources = KnowledgeSource::count();

        $totalTabel = KnowledgeSource::where(
            'data_category',
            KnowledgeSource::CATEGORY_TABEL
        )->count();

        $totalParagraf = KnowledgeSource::where(
            'data_category',
            KnowledgeSource::CATEGORY_PARAGRAF
        )->count();

        return [
            Stat::make('Total Sumber Data', $totalSources)
                ->description('Seluruh sumber data terdaftar')
                ->descriptionIcon('heroicon-o-circle-stack')
                ->color('primary'),

            Stat::make('Data Tabel', $totalTabel)
                ->description('File CSV dan Excel')
                ->descriptionIcon('heroicon-o-table-cells')
                ->color('info'),

            Stat::make('Data Paragraf', $totalParagraf)
                ->description('Sumber data berbentuk teks')
                ->descriptionIcon('heroicon-o-document-text')
                ->color('success'),
        ];
    }
}
