# Элементы для заполнения Seeder

При необходимости подключить классы:

```php
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use DB;
```

## Заполнение таблицы (один из вариантов) 

```php
$data_element = [
    "Ключ" => "Значение",
    "Ключ" => "Значение",
];

foreach ($data_element as $key => $item) {
    Storage::disk('public')->put("project/".$key, file_get_contents($item), 'public');
    DB::table("projects")->insert(
        [
            'title' => $key,
            'year' => $item,
        ]
    );
}

```

## Полезные функции
Функция возвращает все файлы из директории с указанным разрешением

```php
public function get_all_jpg($dir, $resolution) {
    $fname = [];

    foreach (glob($dir . '//*'.$resolution) as $fileName) {
        $fname[basename($fileName)] = $dir. "//" . basename($fileName);
    }

    return $fname;
}

// Пример вызова

$photo = get_all_jpg(public_path("project/".$item."/".$key), ".jpg");    
```
