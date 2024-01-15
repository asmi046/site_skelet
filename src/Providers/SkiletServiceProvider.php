<?php

namespace Asmi046\SiteSkelet\Providers;

use Illuminate\Support\ServiceProvider;

class SkiletServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path("views")
        ], 'all-views');

        $this->publishes([
            __DIR__.'/../public/scss' => public_path("scss")
        ], 'all-scss');

        $this->publishes([
            __DIR__.'/../Http/Controllers/Auth' => app_path("Http/Controllers/Auth")
        ], 'autch-controller');

        $this->publishes([
            __DIR__.'/../Http/Requests' => app_path("Http/Requests")
        ], 'autch-request');
    }
}
