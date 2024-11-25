<?php

namespace Asmi046\SiteSkelet\Providers;


use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Asmi046\SiteSkelet\Console\Commands\CreateUser;
use Asmi046\SiteSkelet\Console\Commands\ChengeUserPass;


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
        if ($this->app->runningInConsole()) {
            $this->commands([
                ChengeUserPass::class,
                CreateUser::class,
            ]);
        }

        Blade::directive('header_seo', static function () {
            return '{!! seo_data() !!}';
        });

        // Модальное окно
        $this->publishes([
            __DIR__.'/../resources/js/components/ModalWindow.vue' => resource_path("js/components/ModalWindow.vue"),
        ], 'modal-win');

        // Скилет
        $this->publishes([
            __DIR__.'/../Http/Controllers/IndexController.php' => app_path("Http/Controllers")."/IndexController.php",
            __DIR__.'/../resources/views/layouts' => resource_path("views/layouts"),
            __DIR__.'/../resources/views/index.blade.php' => resource_path("views")."/index.blade.php",
            __DIR__.'/../routes/asmi_all.php' => base_path("routes")."/asmi_all.php",
            __DIR__.'/../public/scss' => public_path("scss")
        ], 'scilet-all');

        //SEO
        $this->publishes([
            __DIR__.'/../config/asmiseo.php' => base_path("config")."/asmiseo.php",
            __DIR__.'/../database/seeders/SeoDataSeeder.php' => database_path("seeders")."/SeoDataSeeder.php",
            __DIR__.'/../database/migrations/2024_10_16_111113_create_seo_data_table.php' => database_path("migrations")."/2024_10_16_111113_create_seo_data_table.php",
            __DIR__.'/../Models/SeoData.php' => app_path("Models")."/SeoData.php",
            __DIR__.'/../Services/SeoServices.php' => app_path("Services")."/SeoServices.php",
        ], 'seo-all');



        // Боковое меню
        $this->publishes([
            __DIR__.'/../resources/js/menues.js' => resource_path("js")."/menues.js",
            __DIR__.'/../public/scss/_menues.scss' => public_path("scss/_menues.scss"),
            __DIR__.'/../resources/views/components/menues' => resource_path("views/components/menues"),
        ], 'asmi-side-menue');

        // Водяные знаки для загрузки фото
        $this->publishes([
            __DIR__.'/../Actions/WaterMark.php' => app_path("Actions")."/WaterMark.php",
        ], 'asmi-watermark');

        // Меню
        $this->publishes([
            __DIR__.'/../Models/Menu' => app_path("Models/Menu"),
            __DIR__.'/../database/migrations/2024_03_04_111112_create_menus_table.php' => database_path("migrations")."/2024_03_04_111112_create_menus_table.php",
            __DIR__.'/../database/seeders/MenuSeeder.php' => database_path("seeders")."/MenuSeeder.php",
        ], 'asmi-menu');

        $this->publishes([
            __DIR__.'/../MoonShine/Resources/MenuResource.php' => app_path("MoonShine/Resources")."/MenuResource.php"
        ], 'asmi-menu-moon-shine');

        // Страницы сайта
        $this->publishes([
            __DIR__.'/../Models/Page' => app_path("Models/Page"),
            __DIR__.'/../database/migrations/2024_03_04_111111_create_pages_table.php' => database_path("migrations")."/2024_03_04_111111_create_pages_table.php",
            __DIR__.'/../database/seeders/PageSeeder.php' => database_path("seeders")."/PageSeeder.php",
            __DIR__.'/../Http/Controllers/Page' => app_path("Http/Controllers/Page"),
            __DIR__.'/../resources/views/page/' => resource_path("views/page"),
            // Текст Политики
            __DIR__.'/../public/text/policy.html' => public_path("text")."/policy.html",
        ], 'asmi-pages');

        // Иконки месенджеров в углу сата
        $this->publishes([
            __DIR__.'/../resources/views/components/messenger-btn' => resource_path("views/components/messenger-btn"),
            // Стили
            __DIR__.'/../public/scss/messenger-btn' => public_path("scss/messenger-btn"),
        ], 'asmi-messenger-icon');

        // Спрайт с SVG иконками
        $this->publishes([
        __DIR__.'/../resources/views/allicon.blade.php' => resource_path("views")."/allicon.blade.php",
        ], 'asmi-icon-sprite');

        // Хлебные крошки
        $this->publishes([
            __DIR__.'/../resources/views/components/breadcrumbs' => resource_path("views/components/breadcrumbs"),
        ], 'breadcrumbs-component');

        // Пагинация
        $this->publishes([
            __DIR__.'/../resources/views/components/pagination' => resource_path("views/components/pagination"),
        ], 'pagination-component');

        // Хелперы
        $this->publishes([
            __DIR__.'/../Providers/HelpersLoadProvider.php' => app_path("Providers")."/HelpersLoadProvider.php",
            __DIR__.'/../helpers' => app_path("helpers"),
        ], 'site-helper-lib');

        // Компонет карты
        $this->publishes([
            __DIR__.'/../resources/views/components/map' => resource_path("views/components/map"),
        ], 'map-component');

        // Опции сайта
        $this->publishes([
            __DIR__.'/../Providers/OptionsProvider.php' => app_path("Providers").'/OptionsProvider.php',
            // Миграции
            __DIR__.'/../database/migrations/2022_10_17_222225_create_options_table.php' => database_path("migrations")."/2022_10_17_222225_create_options_table.php",
            // Сиды
            __DIR__.'/../database/seeders/OptionSeeder.php' => database_path("seeders")."/OptionSeeder.php",
            // Модели
            __DIR__.'/../Models/Option.php' => app_path("Models")."/Option.php",
            // Текстовка
            __DIR__.'/../public/text/main.html' => public_path("text")."/main.html",
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

        // Авторизация
        $this->publishes([
            __DIR__.'/../Http/Controllers/Auth' => app_path("Http/Controllers/Auth"),
            // Отправщики (Mail)
            __DIR__.'/../Mail/Auth' => app_path("Mail/Auth"),
            __DIR__.'/../resources/views/auth' => resource_path("views/auth"),
            __DIR__.'/../Http/Requests/LoginFormRequest.php' => app_path("Http/Requests")."/LoginFormRequest.php",
            __DIR__.'/../Http/Requests/RegisterFormRequest.php' => app_path("Http/Requests")."/RegisterFormRequest.php",
            __DIR__.'/../routes/asmi_auth.php' => base_path("routes")."/asmi_auth.php",
            __DIR__.'/../routes/asmi_password_req.php' => base_path("routes")."/asmi_password_req.php",
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
            __DIR__.'/../Models/Product.php' => app_path("Models")."/Product.php",
            __DIR__.'/../Models/ProductImage.php' => app_path("Models")."/ProductImage.php",
            __DIR__.'/../Models/ProductPrices.php' => app_path("Models")."/ProductPrices.php",

            // Миграции
            __DIR__.'/../database/migrations/2022_10_17_222201_create_products_table.php' => database_path("migrations")."/2022_10_17_222201_create_products_table.php",
            __DIR__.'/../database/migrations/2022_10_17_222202_create_product_images_table.php' => database_path("migrations")."/2022_10_17_222202_create_product_images_table.php",
            __DIR__.'/../database/migrations/2022_10_17_222203_create_product_prices_table.php' => database_path("migrations")."/2022_10_17_222203_create_product_prices_table.php",

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

            // Blade компоненты
            __DIR__.'/../resources/views/components/burger-icon.blade.php' => resource_path("views/components/burger-icon.blade.php"),

        ], 'all-cart');
    }
}
