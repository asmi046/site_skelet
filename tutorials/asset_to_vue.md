# Передача asset и storage в vue компонент

В основном лайауте уже есть глобальное подключение

в Vue компоненте нужно:


```js    
<template>
    <!-- ...existing code... -->
    <img :src="assetUrl + 'img/top_bg.webp'" alt="Фоновое изображение" class="left-block__bg-image">
    <!-- ...existing code... -->
</template>

<script setup>
import { ref } from 'vue';

const assetUrl = window.Laravel?.assetUrl || '/';
const storageUrl = window.Laravel?.storageUrl || '/storage/';

// ...existing code...
</script>

```
