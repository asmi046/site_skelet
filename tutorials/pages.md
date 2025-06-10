# Страницы сайта

Публикация файлов:

>php artisan vendor:publish --tag=asmi-pages

Публикация ресурса Moon-Shine:

>php artisan vendor:publish --tag=asmi-pages-moon-shine

Необходимые действия:

1. Выполнить миграции
2. Прописать роут в файл web.php или другой необходимый
```php
use App\Http\Controllers\Page\PageController;

Route::get('/page/{slug}', [PageController::class, "index"])->name('page');
```

3. При необходимости настроить PageSeeder.php
