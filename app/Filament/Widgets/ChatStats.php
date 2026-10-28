<?php

namespace App\Filament\Widgets;

use App\Models\LogPercakapan;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ChatStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $totalPesan = LogPercakapan::count();
        $nomorUnik = LogPercakapan::distinct('sender')->count('sender');

        return [
            Stat::make('Total Pesan Masuk', $totalPesan)
                ->description('Seluruh chat yang diproses')
                ->descriptionIcon('heroicon-m-chat-bubble-left-right')
                ->color('success'),

            Stat::make('Nomor Unik', $nomorUnik)
                ->description('Jumlah pengguna berbeda')
                ->descriptionIcon('heroicon-m-users')
                ->color('info'),
        ];
    }
}