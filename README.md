# Скилет для сайта
Скилет сайта (мой личный не всем подойдет)

## Установка пакета
>composer require asmi046/site_skelet

### Добавление всех компонетов
>php artisan vendor:publish --provider =Asmi046\SiteSkelet\Providers\SkiletServiceProvider

### Добавление скилета
>php artisan vendor:publish --tag=scilet-all 

### Добавление атентификации

>php artisan vendor:publish --tag=autch-all 

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



