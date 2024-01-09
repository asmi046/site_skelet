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
            __DIR__.'/../resources/views' => resource_path()
        ], 'courier-views');
    }
}
