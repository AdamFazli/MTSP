<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
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
            $storage = storage_path('app/public');
        $public = public_path('storage');

        if (!File::exists($public)) {
            File::link($storage, $public);
        }
        }
    }
}
