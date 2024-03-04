# Иконки мессенджеров в углу сайта

Публикация файлов:

>php artisan vendor:publish --tag=asmi-messenger-icon

> ! Предварительно нужно установить спрайт с SVG иконками

Необходимые действия:

Подключить компонент в основной лайаут all.blate.php

```php
...
    <x-messenger-btn.messenger-btn></x-messenger-btn.messenger-btn>
...
```

Подключить стили виджета в файле main.scss


```css
@import "messenger-btn/messenger-btn";
```
