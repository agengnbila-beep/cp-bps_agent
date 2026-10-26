<?php

namespace App\Providers\Filament;

use App\Http\Middleware\EnsureUserHasRole;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;

use Filament\Navigation\NavigationGroup;
// use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;

use Filament\Support\Colors\Color;
use Filament\Support\Icons\Heroicon;

use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;

use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Filament\Pages\CustomProfile;
use App\Filament\Pages\CustomDashboard;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->profile(CustomProfile::class)

            // Nama aplikasi
            ->brandName('CP-BPS Batanghari')

            // Warna utama
            ->colors([
                'primary' => Color::hex('#1769D2'),
            ])

            // Tema CSS
            ->viteTheme('resources/css/filament/admin.css')

            // Resource Filament
            ->discoverResources(
                in: app_path('Filament/Resources'),
                for: 'App\\Filament\\Resources'
            )

            // Halaman Filament
            // ->discoverPages(
            //     in: app_path('Filament/Pages'),
            //     for: 'App\\Filament\\Pages'
            // )

            ->pages([
                CustomDashboard::class,
            ])

            // Widget
            ->discoverWidgets(
                in: app_path('Filament/Widgets'),
                for: 'App\\Filament\\Widgets'
            )

            ->widgets([
            ])

            // Grup navigasi Sumber Data
            ->navigationGroups([
                NavigationGroup::make()
                    ->label('Sumber Data')
                    ->icon(Heroicon::OutlinedCircleStack)
                    ->collapsed(),
            ])

            // Middleware aplikasi
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])

            // Middleware autentikasi dan role
            ->authMiddleware([
                Authenticate::class,
                EnsureUserHasRole::class . ':admin',
            ]);
    }
}
