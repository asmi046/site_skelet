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
            __DIR__.'/../Http/Controllers/IndexController.php' => app_path("Http/Controllers")."/IndexController.php",
            __DIR__.'/../resources/views/layouts' => resource_path("views/layouts"),
            __DIR__.'/../resources/views/components' => resource_path("views/components"),
            __DIR__.'/../resources/views/index.blade.php' => resource_path("views")."/index.blade.php",
            __DIR__.'/../routes/asmi_all.php' => base_path("routes")."/asmi_all.php",
            __DIR__.'/../public/scss' => public_path("scss")
        ], 'scilet-all');

        $this->publishes([
            __DIR__.'/../Http/Controllers/Auth' => app_path("Http/Controllers/Auth"),
            __DIR__.'/../Http/Requests/LoginFormRequest.php' => app_path("Http/Requests")."/LoginFormRequest.php",
            __DIR__.'/../Http/Requests/RegisterFormRequest.php' => app_path("Http/Requests")."/RegisterFormRequest.php",
            __DIR__.'/../routes/asmi_auth.php' => base_path("routes")."/asmi_auth.php"
        ], 'autch-all');

    }
}
