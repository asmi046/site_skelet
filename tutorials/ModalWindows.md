# Модальное окно Vue

Компонент модального окна 

Публикация файлов:

>php artisan vendor:publish --tag=modal-win

предварительно устанавливаем библиотеку:

>npm i v-slim-mask

Подключение компонента в app.js:

```JavaScript
    import {createApp} from 'vue/dist/vue.esm-bundler';
    import ModalWindow from "./components/ModalWindow.vue"

    const global_app = createApp({
        components:{
            ModalWindow,
        },
        setup() {}
    })

    global_app.mount("#global_app");
```

Подключение в коде:

```Html
    <div class="modal_win" id="global_app">
        <modal-window rout="/send_consult" redirect="/thencs" hesh="showModal" title="Помощь специалиста" subtitle="Мы свяжемся с Вами в течении 15 минут"></modal-window>
    </div>
```
