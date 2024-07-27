<?php

namespace App\Providers;

use App\Services\HttpResponse\HttpResponseService;
use Illuminate\Support\ServiceProvider;

class HttpResponseProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('http-response', function () {
            return new HttpResponseService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
