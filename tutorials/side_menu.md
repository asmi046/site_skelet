# Боковое меню

Боковое меню с затемением

Публикация файлов:

>php artisan vendor:publish --tag=asmi-side-menue

Необходимые действия:
- В нужный лайаут вставляем вызов компонента  так чтобы родительским был тег body:
```php
    <body>
    ...
    <x-menues.side-menu></x-menues.side-menu>
```
- В файле resources\js\app.js импортируем класс меню и создаем кзкмпляр:

```JavaScript
import SideMenu from './menues.js';

...

let side_menue = new SideMenu('#main_side_menue', '.show_menue_button');

```
