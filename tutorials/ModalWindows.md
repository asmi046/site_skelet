# Модальное окно Vue

Компонент модального окна 

Публикация файлов:

>php artisan vendor:publish --tag=modal-win

предварительно устанавливаем библиотеку:

>npm i v-slim-mask
>npm i vue-axios

Подключение компонента в app.js:

```JavaScript
    import {createApp} from 'vue/dist/vue.esm-bundler'
    import ModalWindow from "./components/ModalWindow.vue"
    import EmptyModal from "./components/EmptyModal.vue"
    import { VMaskDirective } from 'v-slim-mask'

    import axios from 'axios'
    import VueAxios from 'vue-axios'

    const global_app = createApp({
        components:{
            ModalWindow,
        },
        setup() {}
    })

    global_app.use(VueAxios, axios)
    global_app.directive('mask', VMaskDirective)
    global_app.mount("#global_app");
```

Подключение в коде:

```Html
    <div class="modal_win" id="global_app">
        <modal-window rout="/send_consult" redirect="/thencs" hesh="showModal" title="Помощь специалиста" subtitle="Мы свяжемся с Вами в течении 15 минут"></modal-window>

        <city-select-modal hesh="cityselect" title="Выбор города" subtitle="Выберите город в котором вы проживаете">
            // нужное в слот
        </city-select-modal>
    </div>
```
