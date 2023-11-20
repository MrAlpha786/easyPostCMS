<?php

namespace App\Providers;

use App\Models\Courier;
use App\Observers\CourierObserver;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        Courier::observe(CourierObserver::class);

        Blade::if('role', function ($role) {
            return auth()->check() && auth()->user()->role->toString() === $role;
        });
    }
}
