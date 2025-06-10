# Информер Cookies

Компонент оповещающий о Cookies

Публикация файлов:

>php artisan vendor:publish --tag=cookies

Подключение компонента в app.js:

```JavaScript
    import {createApp} from 'vue/dist/vue.esm-bundler'
    import CookiesWarning from "./components/CookiesWarning.vue"


    const global_app = createApp({
        components:{
            CookiesWarning,
        },
        setup() {}
    })

    global_app.use(VueAxios, axios)
    global_app.mount("#modal_app");

```

Подключение в коде:

```Html
    <div class="modal_win" id="modal_app">
        <cookies-warning
            privacy-policy-link="{{ route('page', 'politika-v-oblasti-obrabotki-personalnyx-dannyx') }}"
            cookies-info-link="{{ route('page', 'o-failax-cookie') }}"
            privacy-policy-accept-link="{{ route('page', 'soglasie-na-obrabotku-personalnyx-dannyx') }}"
        />
    </div>
```
