# Страницы сайта

Публикация файлов:

>php artisan vendor:publish --tag=asmi-menu

Необходимые действия:

1. Выполнить миграции
2. При необходимости настроить MenuSeeder.php
3. Добавить меню в звгрузку опций:
```php
use App\Models\Menu\Menu;

$menus = Menu::orderBy('order')->get();

View::share('main_menu', $menus);

```
