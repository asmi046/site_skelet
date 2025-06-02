<template>
    <div v-show="showModal" @click.self="closeWin()" class="popup_wrapper">
        <div class="popup">
            <div @click.prevent="closeWin()" class="popup__close" aria-label="Закрыть модальное окно">
                <svg class="sprite_icon">
                    <use xlink:href="#close_icon"></use>
                </svg>
            </div>

            <h2 class="modal_h2">{{title}}</h2>
            <p class="sub_h">{{subtitle}}</p>
            <form v-show="!showAccept" class="sending_form" action="/send_consult" method="POST">
                <input type="hidden" name="_token" :value="_token">
                <input type="text" v-mask="{mask: '+N (NNN) NNN-NN-NN', model: 'cpf' }" name="phone" v-model="phone" placeholder="Телефон*">
                <div class="error_list_wrap">
                    <div v-for="(item, index) in errorList" :key="index" class="error">{{item}}</div>
                </div>
                <label class="checbox_label" for="policy_ch">
                    <input v-model="policy_ch" type="checkbox" id="policy_ch">
                    <span>Я соглашаюсь с <a href="/page/politika-v-oblasti-obrabotki-personalnyx-dannyx"> политикой в области обработки персональных данных</a></span>
                </label>

                <label class="checbox_label" for="accept_ch">
                    <input v-model="accept_ch" type="checkbox" id="accept_ch">
                    <span>Я даю <a href="/page/soglasie-na-obrabotku-personalnyx-dannyx">согласие на обработку моих персональных данных</a></span>
                </label>
                <br>
                <div class="control_wrap">
                    <button :disabled="showLoader" class="btn" @click.prevent="sendMsg()">Отправить</button>
                    <div v-show="showLoader" class="loader">
                        <svg class="sprite_icon">
                            <use xlink:href="#loader_icon"></use>
                        </svg>
                    </div>
                </div>

            </form>
            <div v-show="showAccept" class="accept_message">
                <p class="emoji">📢🤝✅</p>
                <h2>Ваше сообщение отправлено</h2>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';

const props = defineProps({
    rout: String,
    redirect: String,
    hesh: String,
    title: String,
    subtitle: String
});

const policy_ch = ref(false)
const accept_ch = ref(false)

const phone = ref("");
const showModal = ref(false);
const showLoader = ref(false);
const showAccept = ref(false);
const errorList = ref([]);
const _token = ref(document.querySelector('meta[name="_token"]').content);

const closeWin = () => {
    showModal.value = false;
    history.pushState('', document.title, window.location.pathname + window.location.search);
};

const openWin = () => {
    if (location.hash === '#' + props.hesh) {
        showModal.value = true;
    }
};

const sendMsg = () => {
    errorList.value = [];

    if (phone.value === "") {
        errorList.value.push("Поле 'Телефон' не заполнено");
    }

    if (policy_ch.value == false) {
        errorList.value.push("Вы не согласились с политикой");
    }

    if (accept_ch.value == false) {
        errorList.value.push("Вы не согласились на обработку персональных данных");
    }

    if (errorList.value.length !== 0) return;

    showLoader.value = true;

    axios.post(props.rout, {
        _token: _token.value,
        phone: phone.value,
    })
    .then((response) => {
        showLoader.value = false;
        showAccept.value = true;
    })
    .catch((error) => {
        showLoader.value = false;
        console.log(error)
        errorList.value.push(error.response.data.message)

    });
};

onMounted(() => {
    window.addEventListener('hashchange', openWin);

    if (location.hash === '#' + props.hesh) {
        showModal.value = true;
    }
});
</script>
