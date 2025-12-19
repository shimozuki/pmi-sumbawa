<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\BloodStock;
use App\Models\Screening;
use App\Observers\BloodStockObserver;
use App\Observers\ScreeningObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Screening::observe(ScreeningObserver::class);
        BloodStock::observe(BloodStockObserver::class);
    }
}
