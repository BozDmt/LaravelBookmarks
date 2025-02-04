<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Libraries\fmtInspiring;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->singleton(fmtInspiring::class, 'fmtQuote');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
