# Контакты

Публикация файлов:

>php artisan vendor:publish --tag=asmi-contacts

Необходимые действия:

1. Выполнить миграции
2. Настроить ContactSeeder.php

## Публикация ресурса в админку MoonShine

>php artisan vendor:publish --tag=asmi-contacts-moon-shine

Добавление в лайаут:

```php
use App\MoonShine\Resources\ContactResource;

...

 MenuItem::make('Контакты', ContactResource::class)->icon('chat-bubble-bottom-center-text'),


```
