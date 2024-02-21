# Спрайт с иконками

Публикация файлов:

>php artisan vendor:publish --tag=asmi-icon-sprite

Необходимые действия:

Прописать в основной лайаут all.blade.php подключение спрайта

```php
<body>
    @include("allicon")
    ...
```
## Использование иконки из спрайта

```html
<svg class="sprite_icon">
    <use xlink:href="#vk_icon"></use>
</svg>
```
## Стилизация иконки из спрайта

```css
    .sprite_icon {
        fill: #333;
    }

```