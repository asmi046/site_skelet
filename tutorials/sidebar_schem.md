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

            <div class="sb_body">
                <nav>
                    <ul>
                        <li><a href="#">Продукция</a></li>
                        <li><a href="#">Услуги</a></li>
                    </ul>
                </nav>

                <div class="sb_contact">
                
                </div>

            </div>

            <footer>

            </footer>
        </div>

        <div class="main_page">
            @yield('main')
        </div>
    </main>
```
