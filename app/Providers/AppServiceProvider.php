<?php

namespace App\Providers;

use App\Models\Courier;
use App\Observers\CourierObserver;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\URL;
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
        // Generate secure url
        if (env('APP_ENV') !== 'local') {
            URL::forceScheme('https');
        }
        // Bind the observer to model
        Courier::observe(CourierObserver::class);

        // Create a custom blade directive to check user roles in templates.
        Blade::if('role', function ($role) {
            return auth()->check() && auth()->user()->role->toString() === $role;
        });
    }
}
