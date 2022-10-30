

import './bootstrap';
import { createApp } from 'vue';


const app =createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
import { createRouter, createWebHistory } from 'vue-router';
import {routes} from "./routes"

const router=createRouter({
    history:createWebHistory(),
    routes:routes,
})
app.component("example-component",ExampleComponent)

 app.use(router)
app.mount('#app');
