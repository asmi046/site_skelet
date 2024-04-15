# Все импортируемые части

[Установка скилета](#установка-пакета) (Основная)

[Боковое меню](side_menu.md)

[Хлебные крошки](breadcrumbs.md)

[Водяные знаки для загружаемых фото](water_mark.md)

[Пагинация](pagination_help.md)

[Спрайт с SVG иконками](icon_sprite.md)

[Опции сайта](site_options.md)

[Форма консультации](consultation_for.md)

[Аутентификация](autontification.md) 

[Корзина](bascet.md)

Лайауты:

[Схема с сайдбаром](sidebar_schem.md)

Фрагменты кода:

[Формирование Seeder](seeder_help.md)

[Хэлперы](helpers.md)


## Установка пакета
>composer require asmi046/site_skelet --dev

### Добавление всех компонетов
>php artisan vendor:publish --provider =Asmi046\SiteSkelet\Providers\SkiletServiceProvider

### Добавление скилета
>php artisan vendor:publish --tag=scilet-all 



В файле RouteServiceProvider.php добавляем группы роутов:

```php
Route::middleware('web')
    ->group(base_path('routes/asmi_all.php'));


```
Добавляем SCSS:

>npm add -D sass

Добавляем плагин vue:

>npm i @vitejs/plugin-vue

Редактируем vite.config.js:

```JavaScript
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});

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

Успешное выполнение действия после отправки формы:

```php
return redirect()->route('order-edit', $id)->with('success_order', 'Заказ сохранен сохранены');
```

```php
@if (session('success_order'))
    <p class="success">{{ session('success_order') }}</p>
@endif
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

