<template>
    <div class="mosaic-form--u-i4j8vnhzh p-4 text-black">
        <h3>Заказать сейчас</h3>
        <p>{{ product.title }} {{ product.volume }} {{ product.volume_text }}</p>
        <input v-model="name" type="text" placeholder="Имя" class="mosaic-form__text mosaic-form__text--u-iabwke48f mb-2">
        <input v-model="phone" type="tel" placeholder="Телефон *" class="mosaic-form__text mosaic-form__text--u-iabwke48f">
        <button id="ixb2u1gp8_0" class="mosaic-form__button mosaic-form__button--u-ixb2u1gp8" v-on:click="send">
            <span id="ipw8logib_0" class="button__text button__text--u-ipw8logib">
                <span class="text-block-wrap-div">Заказать</span>
            </span>
            <span id="iwxo1ensb_0" image="[object Object]" class="svg_image svg_image--u-iwxo1ensb"><svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" data-prefix="ijacxh2bf"><path data-name="2.svg" d="M0 1.41L4.32 6 0 10.59l1.33 1.409 5.66-6-5.66-6z" fill-rule="evenodd" class="path-iepi603du"></path></svg></span>
        </button>
        <p class="mb-0 text-muted fs-6 mt-2">Наш менеджер свяжется с вами для уточнения деталей заказа.</p>
    </div>
</template>

<script>
export default {
    props: [
        'item'
    ],
    data() {
        return {
            count: 1,
            product: [],

            name: '',
            phone: '',
        }
    },
    mounted() {
        this.product = JSON.parse(this.item);
        console.log(this.product)
    },
    methods: {
        send() {
            console.log(this.name)
        }
    },
    watch: {
        count: {
            handler(newValue) {
                console.log(newValue)
            },
            deep: true,
        },
    }
}
</script>
