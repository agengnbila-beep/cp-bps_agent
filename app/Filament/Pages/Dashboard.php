<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\ChatStats;
use App\Filament\Widgets\ChatChart;
use App\Filament\Widgets\RecentChats;

class Dashboard extends BaseDashboard
{
    public function getWidgets(): array
    {
        return [
            ChatStats::class,
            ChatChart::class, // <-- Tambahkan ini
            RecentChats::class,
        ];
    }
}