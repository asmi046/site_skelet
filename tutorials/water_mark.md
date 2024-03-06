# Водяные знаки для загружаемых фото

Публикация файлов:

>php artisan vendor:publish --tag=asmi-watermark

Вызов проставки водяных знаков:

```php
Log::info("Накладываем марку");
$img_patch = Storage::path("");
$watermark = new WaterMark();
$img = imagecreatefromjpeg($img_patch);
$water = imagecreatefrompng(public_path('watermark/wm.png'));
$im=$watermark->handle($img,$water,100);
imagejpeg($im, $img_patch);
Log::info("Закончили");
```

>!!! Так же необходимо прописать событие в провайдере
