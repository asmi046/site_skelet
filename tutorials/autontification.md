# Добавление атентификации

>php artisan vendor:publish --tag=autch-all 

В файле RouteServiceProvider.php добавляем группы роутов:

```php
Route::middleware('web')
    ->group(base_path('routes/asmi_auth.php'));
```

Изменяем модель User:

```php

use Illuminate\Contracts\Auth\MustVerifyEmail;
....

class User extends Authenticatable implements MustVerifyEmail
{
```

Добавляем в AppServiceProvider.php:
```php
use Illuminate\Auth\Notifications\VerifyEmail;
use App\Mail\Auth\VerifyEmailMail;

...

VerifyEmail::toMailUsing(function ($notifiable, $url) {
    return new VerifyEmailMail($url, route('home'), $notifiable->email);
});
```