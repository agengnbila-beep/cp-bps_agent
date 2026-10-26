<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class DashboardQuickAccess extends Widget
{
    protected string $view = 'filament.widgets.dashboard-quick-access';

    protected int|string|array $columnSpan = 'full';
}
