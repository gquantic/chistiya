import './bootstrap';

import {createApp} from 'vue'

import Order from "./Components/Forms/Order.vue";

let app = createApp({});

app.component('order-form', Order);

var wrapExists = document.getElementById("app");

if (wrapExists != null) {
    app.mount('#app');
}
