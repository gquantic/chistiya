import './bootstrap';

import {createApp} from 'vue'

import Order from "./Components/Forms/Order.vue";
import Callback from "./Components/Forms/Callback.vue";

let app = createApp({});

app.component('order-form', Order);
app.component('callback-form', Callback);

var wrapExists = document.getElementById("app");

if (wrapExists != null) {
    app.mount('#app');
}
