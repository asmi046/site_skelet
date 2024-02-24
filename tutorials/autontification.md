# Добавление атентификации

>php artisan vendor:publish --tag=autch-all 

В файле RouteServiceProvider.php добавляем группы роутов:

```php
Route::middleware('web')
    ->group(base_path('routes/asmi_auth.php'));
```

Изменяем модель:

```php
class User extends Authenticatable implements MustVerifyEmail
{
```
