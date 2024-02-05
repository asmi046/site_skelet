# Скилет для сайта
Скилет сайта (мой личный не всем подойдет)

## Установка пакета
>composer require asmi046/site_skelet

### Добавление всех компонетов
>php artisan vendor:publish --provider =Asmi046\SiteSkelet\Providers\SkiletServiceProvider

### Добавление скилета
>php artisan vendor:publish --tag=scilet-all 

В файле RouteServiceProvider.php добавляем группы роутов:

```php
Route::middleware('web')
    ->group(base_path('routes/asmi_all.php'));

```

### Добавление атентификации

>php artisan vendor:publish --tag=autch-all 

В файле RouteServiceProvider.php добавляем группы роутов:

```php
Route::middleware('web')
    ->group(base_path('routes/asmi_auth.php'));

```

## Элементы верстки

Секция:
```html
<section class="section_1">

</section>
```


Контейтер:
```html
<div class="container">

</div>
```

Форма:
```html
<form action="{{route('')}}" method="post">

</form>
```

Поле формы:
```html
<div class="field">
    <label class="label">E-mail</label>
    <div class="control">
        <input name="email" class="input" type="email" placeholder="">
    </div>

    @error('email')
        <p class="error">{{$message}}</p>
    @enderror
</div>
```


Таблицы:

```html
<table>
    <thead>
        <tr>
            <th>Столбец 1</th>
            <th>Столбец 2</th>
            <th>Столбец 3</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>Столбец 1</td>
            <td>Столбец 2</td>
            <td>Столбец 3</td>
        </tr>
    </tbody>
</table>
```

## Оформление

Бокс с тенью:
```html
<div class="box">

</div>
```
 

## Компоненты

Ссылка с иконкой

```php
    <x-a-icon href="{{ route('') }}" icon="fa-solid fa-door-open">Ссылка</x-a-icon>
```

Открывающийся details 

```html
        <details>
            <summary>
            
            </summary>
            <div class="response">
     
            </div>
        </details>
```

## Элементы формы

Поле поиска совмещенное с кнопкой

```html
    <div class="search_input">
        <input type="text">
        <button type="submit"><i class="pi ap_lins"></i></button>
    </div>
```

Кнопка простая

```html
    <button type="submit" class="button ">Кнопка</button>
    <a class="button" href="#">Кнопка из ссылки</a>
```

Кнопка простая прозрачная (как ссылка)

```html
    <button type="submit button-white" class="button ">Кнопка</button>
    <a class="button button-white" href="#">Кнопка из ссылки</a>
```

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
