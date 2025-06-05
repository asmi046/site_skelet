# Страницы сайта

Публикация файлов:

>php artisan vendor:publish --tag=asmi-menu

Необходимые действия:

1. Выполнить миграции
2. При необходимости настроить MenuSeeder.php

## Публикация ресурса в админку MoonShine

>php artisan vendor:publish --tag=asmi-menu-moon-shine

Добавление в лайаут:

```php
use App\MoonShine\Resources\MenuResource;

...

 MenuItem::make('Меню', MenuResource::class)->icon('bars-3-bottom-left'),


```
