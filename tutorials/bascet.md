# Интеграция корзины

## Публикация корзины
>php artisan vendor:publish --tag=all-cart

После публикации будут опубликовыны  следующие элементы:

**Действия (Actions)**
>app/Actions/BascetToTextAction.php

>app/Actions/TelegramSendAction.php

**Контроллеры**
>app/Http/Controllers/Cart/CartController.php

>app/Http/Controllers/Cart/FavoriteController.php

>app/Http/Controllers/Cart/feed/FeedController.php

**Реквесты**
>app/Http/Requests/Cart/BascetForm.php

**Отправщики (Mail)**
>app/Mail/Cart/BascetSend.php

**Конфиги**
>config/cart.php

>config/telegram.php

**Модели**
>app/Models/Cart.php

>app/Models/Favorite.php

>app/Models/Order.php

>app/Models/OrderProduct.php

**Миграции**
>database/migrations/2022_10_17_222221_create_carts_table.php

>database/migrations/2022_10_17_222222_create_orders_table.php

>database/migrations/2022_10_17_222224_create_favorites_table.php

>database/migrations/2022_10_17_222223_create_order_products_table.php

**Стили**
>public/scss/cart/all-cart.scss

>public/scss/cart/_to_cart_widget.scss

>public/scss/cart/_to_card_btn.scss

>public/scss/cart/_cart_table_in_page.scss

**JavaScript и Vue компоненты**
>resources/js/cart.js

>resources/js/storage.js

>resources/components/cart/Cart.vue

>resources/components/cart/CartCounter.vue

>resources/components/cart/FavoritesCounter.vue

>resources/components/cart/PageToCart.vue

>resources/components/cart/PaySelector.vue

>resources/components/cart/ToBascetBtnPage.vue

>resources/components/cart/ToFavoritesBtn.vue

**Шаблоны**
>resources/views/cart/cart-svg.blade.php

>resources/views/cart/cart.blade.php

>resources/views/cart/thencs.blade.php

>resources/views/cart/feed/yml_cactegory.blade.php

**Маршруты**
>routes/asmi_cart.php
>routes/asmi_favorites.php

## Дополнительная настройка

В файл .env  добавить настройки SMTP

```php
MAIL_MAILER=smtp
MAIL_HOST=smtp.yandex.ru
MAIL_PORT=465
MAIL_USERNAME=<yor_login>@yandex.ru
MAIL_PASSWORD=<yor_password>
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS="<yor_login>@yandex.ru"
MAIL_FROM_NAME="${APP_NAME}"
```

Так же в файл .env  добавить настройки Telegram  оповещения

```php
TG_TOKEN=
TG_CORESPONDENTS=""
```

Кореспонденты, перечисляются в строке через запятую

В файле RouteServiceProvider.php добавляем группы роутов:

```php
Route::middleware('web')
    ->group(base_path('routes/asmi_cart.php'));
Route::middleware('web')
    ->group(base_path('routes/asmi_favorites.php'));
```

В файле vite.config.js добавляем скрипт корзины:

```php
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: [
                .....
                'resources/js/cart.js',
                .....
            ],
            refresh: true,
        }),
    ],
});
```

Так же нужно добавить скрипт в диррективу @vite

```php
@vite([
    ...
    'resources/js/app.js',
    ...
])
```

Подключите стили корзины в основной файл main.scss

```scss
    @import "....";
    @import "cart/all-cart";
```

Добавьте компонент svg спрайта в файл all.blade.php:

```php
<body>
    @include("cart.cart-svg")
    ...
```

Выполните следующие artisan команды:

>php artisan route:cache

>php artisan config:cache

>php artisan migrate

## Внедрение компонентов корзины

Счетчик товаров в корзине:

```php

<a id="counter_app" href="{{ route('bascet') }}" >
    <cart-counter></cart-counter>
</a>

```

Элемент добавления в корзину на странице товара:

```php
 <div id="cart_app">
 ...
 <page-to-cart sku="{{$product->sku}}" :prices="{{json_encode($product->product_prices)}}"></page-to-cart>
 ...
 </div>
```
