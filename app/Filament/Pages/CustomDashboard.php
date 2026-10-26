<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\DashboardWelcome;
use App\Filament\Widgets\DashboardStats;
use App\Filament\Widgets\DashboardQuickAccess;
use Filament\Pages\Dashboard;

class CustomDashboard extends Dashboard
{
    protected static ?string $title = 'Dashboard';

    protected static ?string $navigationLabel = 'Dashboard';

    public function getWidgets(): array
    {
        return [
            DashboardWelcome::class,
            DashboardStats::class,
            DashboardQuickAccess::class,
        ];
    }
}
