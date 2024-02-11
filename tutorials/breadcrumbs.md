# Хлебные крошки

>php artisan vendor:publish --tag=breadcrumbs-component

Будет скопирован компонент хлебных крошек размеченный в соотвествии со schema.org

Использование компанента:
```php
<x-breadcrumbs.main></x-breadcrumbs.main>
```

Если необходимо использовать внутри секции:

```php
<section class="breadcrumbs_section">
    <div class="container">
        <x-breadcrumbs.main></x-breadcrumbs.main>
    </div>
</section>


```
