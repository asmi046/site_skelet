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
        // Скилет
        $this->publishes([
            __DIR__.'/../Http/Controllers/IndexController.php' => app_path("Http/Controllers")."/IndexController.php",
            __DIR__.'/../resources/views/layouts' => resource_path("views/layouts"),
            __DIR__.'/../resources/views/index.blade.php' => resource_path("views")."/index.blade.php",
            __DIR__.'/../routes/asmi_all.php' => base_path("routes")."/asmi_all.php",
            __DIR__.'/../public/scss' => public_path("scss")
        ], 'scilet-all');

        // Хлебные крошки
        $this->publishes([
            __DIR__.'/../resources/views/components/pagination' => resource_path("views/components/pagination"),
        ], 'breadcrumbs-component');

        // Пагинация
        $this->publishes([
            __DIR__.'/../resources/views/components/breadcrumbs' => resource_path("views/components/breadcrumbs"),
        ], 'pagination-component');

        // Хелперы
        $this->publishes([
            __DIR__.'/../Providers/HelpersLoadProvider.php' => app_path("Providers"),
            __DIR__.'/../helpers' => app_path("helpers"),
        ], 'site-helper-lib');

        // Опции сайта
        $this->publishes([
            __DIR__.'/../Providers/OptionsProvider.php' => app_path("Providers"),
            // Миграции
            __DIR__.'/../database/migrations/2022_10_17_222225_create_options_table.php' => database_path("migrations")."/2022_10_17_222225_create_options_table.php",
            // Сиды
            __DIR__.'/../database/seeder/OptionSeeder.php' => database_path("seeder")."/OptionSeeder.php",
            // Модели
            __DIR__.'/../Models/Option.php' => app_path("Models")."/Option.php",
        ], 'site-options-component');

        // Форма консультации
        $this->publishes([
            __DIR__.'/../config/consultation.php' => base_path("config")."/consultation.php",
            __DIR__.'/../config/telegram.php' => base_path("config")."/telegram.php",
            // Действия (Actions)
            __DIR__.'/../Actions/TelegramSendAction.php' => app_path("Actions")."/TelegramSendAction.php",
            // Контроллеры
            __DIR__.'/../Http/Controllers/Consultation' => app_path("Http/Controllers/Consultation"),
            // Реквесты
            __DIR__.'/../Http/Requests/Consultation' => app_path("Http/Requests/Consultation"),
            // Отправщики (Mail)
            __DIR__.'/../Mail/Consultation' => app_path("Mail/Consultation"),
            //Шаблоны
            __DIR__.'/../resources/views/components/consultation-form' => resource_path("views/components/consultation-form"),
            __DIR__.'/../resources/views/mail/consultation' => resource_path("views/mail/consultation"),
            //Роуты
            __DIR__.'/../routes/asmi_consultation.php' => base_path("routes")."/asmi_consultation.php",
        ], 'consultation-form');

        $this->publishes([
            __DIR__.'/../Http/Controllers/auth' => app_path("Http/Controllers/auth"),
            __DIR__.'/../resources/views/auth' => resource_path("views/auth"),
            __DIR__.'/../Http/Requests/LoginFormRequest.php' => app_path("Http/Requests")."/LoginFormRequest.php",
            __DIR__.'/../Http/Requests/RegisterFormRequest.php' => app_path("Http/Requests")."/RegisterFormRequest.php",
            __DIR__.'/../routes/asmi_auth.php' => base_path("routes")."/asmi_auth.php"
        ], 'autch-all');

        $this->publishes([
            // Действия (Actions)
            __DIR__.'/../Actions/BascetToTextAction.php' => app_path("Actions")."/BascetToTextAction.php",
            __DIR__.'/../Actions/TelegramSendAction.php' => app_path("Actions")."/TelegramSendAction.php",
            // Контроллеры
            __DIR__.'/../Http/Controllers/Cart' => app_path("Http/Controllers/Cart"),
            // Реквесты
            __DIR__.'/../Http/Requests/Cart' => app_path("Http/Requests/Cart"),
            // Отправщики (Mail)
            __DIR__.'/../Mail/Cart' => app_path("Mail/Cart"),
            // Конфиги
            __DIR__.'/../config/cart.php' => base_path("config")."/cart.php",
            __DIR__.'/../config/telegram.php' => base_path("config")."/telegram.php",
            // Модели
            __DIR__.'/../Models/Cart.php' => app_path("Models")."/Cart.php",
            __DIR__.'/../Models/Favorite.php' => app_path("Models")."/Favorite.php",
            __DIR__.'/../Models/Order.php' => app_path("Models")."/Order.php",
            __DIR__.'/../Models/OrderProduct.php' => app_path("Models")."/OrderProduct.php",
            // Миграции
            __DIR__.'/../database/migrations/2022_10_17_222221_create_carts_table.php' => database_path("migrations")."/2022_10_17_222221_create_carts_table.php",
            __DIR__.'/../database/migrations/2022_10_17_222222_create_orders_table.php' => database_path("migrations")."/2022_10_17_222222_create_orders_table.php",
            __DIR__.'/../database/migrations/2022_10_17_222224_create_favorites_table.php' => database_path("migrations")."/2022_10_17_222224_create_favorites_table.php",
            __DIR__.'/../database/migrations/2022_10_17_222223_create_order_products_table.php' => database_path("migrations")."/2022_10_17_222223_create_order_products_table.php",
            // Стили
            __DIR__.'/../public/scss/cart' => public_path("scss/cart"),
            // JavaScript
            __DIR__.'/../resources/js/cart.js' => resource_path("js")."/cart.js",
            __DIR__.'/../resources/js/storage.js' => resource_path("js")."/storage.js",
            __DIR__.'/../resources/js/components/cart' => resource_path("js/components/cart"),

            //Шаблоны
            __DIR__.'/../resources/views/cart' => resource_path("views/cart"),

            // Роуты
            __DIR__.'/../routes/asmi_cart.php' => base_path("routes")."/asmi_cart.php",
            __DIR__.'/../routes/asmi_favorites.php' => base_path("routes")."/asmi_favorites.php",

        ], 'all-cart');
    }
}
