# Скилет для сайта
Скилет сайта (мой личный не всем подойдет)

[Установка скилета](#установка-пакета) (Основная)

[Хлебные крошки](tutorials/breadcrumbs.md)

[Форма консультации](tutorials/consultation_for.md)

[Аутентификация](tutorials/autontification.md) 

[Корзина](tutorials/bascet.md)

Фрагменты кода:

[Формирование Seeder](tutorials/seeder_help.md)


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

