# Контакты — Гайд по публикации

## Обзор

Модуль контактов позволяет управлять контактной информацией сайта через БД и использовать её в любом месте через хелпер `contact()`.

## Публикация

### Полная публикация контактов

```bash
php artisan vendor:publish --tag=asmi-contacts
```

### Только MoonShine ресурс (админка)

```bash
php artisan vendor:publish --tag=asmi-contacts-moon-shine
```

## Что публикуется

| Файл | Назначение |
|------|------------|
| `Models/Contact.php` | Модель для работы с контактами |
| `database/migrations/...create_contacts_table.php` | Миграция таблицы `contacts` |
| `database/seeders/ContactSeeder.php` | Сидер с демо-контактами |
| `Http/Controllers/ContactController.php` | Контроллер страницы контактов |
| `resources/views/contacts/contacts.blade.php` | Blade-шаблон страницы |

## Структура таблицы contacts

| Поле | Описание |
|------|----------|
| `name` | Системное имя (adress, phone, email...) |
| `title` | Заголовок для отображения |
| `value` | Значение контакта |

## Демо-данные (ContactSeeder)

По умолчанию создаёт записи:
- `adress` — Адрес
- `phone` — Телефон
- `phone_2` — Доп. телефон
- `email` — Email
- `geo` — Координаты/地名
- `work_time` — Время работы

## Использование

### Хелпер contact()

```blade
{{ contact('phone') }}        {{-- возвращает значение телефона --}}
{{ contact('email') }}        {{-- возвращает email --}}
{{ contact('adress') }}       {{-- возвращает адрес --}}
```

### Контроллер ContactController

Роут:
```php
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
```

В Blade доступны:
```blade
$contacts['adress']
$contacts['phone']
$contacts['phone_2']
$contacts['email']
$contacts['geo']
$contacts['work_time']
```

## Кэширование

Данные кэшируются через `Cache::rememberForever()`:
- `all_contacts_name` — ключ по полю `name`
- `all_contacts_title` — ключ по полю `title`

Для очистки кэша:
```php
Cache::forget('all_contacts_name');
Cache::forget('all_contacts_title');
```

## Хелпер content_block()

Доступен для контент-блоков (если есть модель `ContentBlock`):

```blade
@foreach(content_block('group_name') as $block)
    {{ $block->title }}
    {{ $block->value }}
@endforeach
```
