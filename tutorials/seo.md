# SEO настройки

Компоненты для вывода seo данных 

Публикация файлов:

>php artisan vendor:publish --tag=seo-all

Публикация ресурса MoonShine:

>php artisan vendor:publish --tag=asmi-seo-moon-shine

Добавление ресурса MoonShine в лайаут:


```php    
use App\MoonShine\Resources\SeoDataResource;

MenuItem::make(
    static fn() => __('SEO'),
    SeoDataResource::class,
)->icon('chart-bar-square'),
```

Регистрация ресурса MoonShine в провайдере (MoonShineServiceProvider.php):


```php 
    use App\MoonShine\Resources\SeoDataResource;

    $core
            ->resources([
                SeoDataResource::class,
```

Необходимо опубликовать хелперы

В лайауте нужно добавить директиву:

```php    
    @header_seo
```

Для для вывода данных в blade файлах:

```php    
    seo_data()->seo_data->page_title;
```

Заполнение в Seeders:

```php    
    DB::table("seo_data")->insert(
        [
            'url' => 'doctors/'.$item['slug'],
            'seo_title' => $item['name'],
            'seo_description' => $item['name'],
        ]
    );
```
