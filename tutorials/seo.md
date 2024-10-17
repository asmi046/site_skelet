# SEO настройки

Компоненты для вывода seo данных 

Публикация файлов:

>php artisan vendor:publish --tag=all-seo

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
