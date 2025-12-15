<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Panel;
use Filament\PanelProvider;

class PendonorPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('pendonor')
            ->path('pendonor')
            ->login()
            ->registration() // pendonor bisa register
            ->authMiddleware([
                Authenticate::class,
            ])
            ->discoverResources(
                in: app_path('Filament/Pendonor/Resources'),
                for: 'App\\Filament\\Pendonor\\Resources'
            )
            ->discoverPages(
                in: app_path('Filament/Pendonor/Pages'),
                for: 'App\\Filament\\Pendonor\\Pages'
            );
    }
}
