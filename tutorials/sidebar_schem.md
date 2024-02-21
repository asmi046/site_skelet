# Схема страницы с сайдбаром

Необходимо установить скилет

Далее разкомментировать строчки в файле public/scss/main.scss

```css
//  Схема с сайдбаром
@import "sidebar-schem";
```

Далее необходимо внести изменение в основной шаблон all.blade.scss

```php
    <main class="sidebar_schem" id="main">

        <div class="mobile_menu_btn">
            <i class="fa-solid fa-bars open"></i>
            <i class="fa-solid fa-xmark close"></i>
        </div>

        <div class="sidebar">
            <header>

            </header>


            <footer>

            </footer>
        </div>

        <div class="main_page">
            @yield('main')
        </div>
    </main>
```
