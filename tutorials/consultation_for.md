# Форма консультации

Внимание рекомендуем установливать после копирования скилета сайта

Публикация файлов:

>php artisan vendor:publish --tag=consultation-form

После установки необходимо произвести следующие действия:

1. В файле RouteServiceProvider.php добавляем роут:

```php
Route::middleware('web')
    ->group(base_path('routes/asmi_consultation.php'));

```

2. Если ранее не добавлялось нужно добавить в файл .env следующие параметры

Так же в файл .env  добавить настройки Telegram  оповещения

```php
TG_TOKEN=""
TG_CORESPONDENTS=""
```
Кореспонденты, перечисляются в строке через запятую


3. Если ранее не производили замену то заменить настройки SMTP сервера в файле .env:
```php
MAIL_MAILER=smtp
MAIL_HOST=smtp.yandex.ru
MAIL_PORT=465
MAIL_USERNAME=<yor_login>@yandex.ru
MAIL_PASSWORD=<yor_password>
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS="<yor_login>@yandex.ru"
MAIL_FROM_NAME="${APP_NAME}"
```
4. Выполнить следующие команды

>php artisan route:cache

>php artisan config:cache

## Добавление формы консультации в разметку сайта

```php
    <x-consultation-form.form  title="Запрос прайса"></x-consultation-form.form>
```


