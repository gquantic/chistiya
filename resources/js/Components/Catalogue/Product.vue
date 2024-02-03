<template>
    <div class="d-flex align-items-center">
        <button class="btn btn-light" v-on:click="count--">-</button>
        <input type="text" v-model="count">
        <button class="btn btn-light" v-on:click="count++">+</button>
    </div>
</template>

<script>
import Input from "../Form/Input.vue";

export default {
    components: {Input},
    props: {
        itemId: Number,
    },
    data() {
        return {
            count: 1,
        }
    },
    mounted() {
        let cart = localStorage.getItem('cart');
        this.count = cart[this.itemId].count;
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
