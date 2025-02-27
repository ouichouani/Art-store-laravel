<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // dump(Route::getMiddleware()); // This will output all registered middleware
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
