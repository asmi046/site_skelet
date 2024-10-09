# Компонент пагинации

Компонент для вывода карты

Публикация файлов:

>php artisan vendor:publish --tag=map-component

Пример интеграции в шаблон:

```php
    <x-map.map-in-page :geo="$contacts['geo']" :adres="$contacts['adress']" :phone="$contacts['phone']"></x-map.map-in-page>
```

В массив $contacts_data передаются следующие параметы:
- 'geo' координаты центра и отмечаемой точки (без квадратных скобок)
- 'adres' адрес отображаемый в балуне
- 'phone' телефон отображаемый в балуне

