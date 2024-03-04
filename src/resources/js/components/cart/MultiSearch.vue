<template>
    <div class=" multi_search search header__search">
    	<form role="search" method="GET" :action="url" id="searchform" class="search__form">
    		<input  type="text" placeholder="Поиск" class="search__input input" @input="evt=>squery=evt.target.value" :value="squery" name="search_str" id="s">
    		<button type="submit" tabindex="2" value="" id="searchsubmit" class="search__btn"></button>
    	</form>
        <div v-show="show_list" class="search_list">
            <button @click="show_list = false" class="close_search_list">
                <svg class="sprite_icon">
                    <use xlink:href="#close_icon"></use>
                </svg>
            </button>
            <div v-show="category.length > 0" class="category items">
                <h5>Категории:</h5>
                <a v-for="item in category" :key="item.id" :href="'/catalog/'+item.slug">{{ item.name }}</a>
            </div>
            <div v-show="product.length > 0" class="product items">
                <a :href="'/product/'+item.slug" v-for="item in product" :key="item.id" class="product_element">
                    <div class="img">
                        <img :src="item.img" alt="">
                    </div>
                    <div class="inform">
                        <h5>{{ item.title }}</h5>
                        <p>Артикул: {{ item.sku }}</p>
                    </div>
                    <div class="price">
                        <p>от {{ item.tovar_prices[0].price }} руб.</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
import { ref, watch, watchEffect } from 'vue'
export default {
    props: {
        url:String,
        squery:String,
    },

    setup(props) {
        let show_list = ref(false)
        let squery = ref(props.squery)
        let category = ref([])
        let product = ref([])

        watch(squery, () => {
            if (squery.value.length > 4){
                axios.get('/multi_search', { params: { squery: squery.value } })
                .then((response) => {
                    console.log(response.data)
                    if (response.data.category.length > 0 || response.data.product.length > 0)
                    {
                        category.value = response.data.category;
                        product.value = response.data.product;
                        show_list.value = true
                    } else {
                        show_list.value = false
                    }
                })
                .catch(error => console.log(error));
            } else show_list.value = false
        });

        return {
            category,
            product,
            show_list,
            url:props.url,
            squery
        }
    }
}
</script>

<style>

</style>
