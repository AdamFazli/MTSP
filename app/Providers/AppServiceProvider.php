<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Vite;

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
        // Force HTTPS in production environment
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        // Prefetch Vite assets (if you're using Vite for frontend)
        Vite::prefetch(concurrency: 3);
    }
}
