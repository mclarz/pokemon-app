/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import VueRouter from 'vue-router'

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import '@fortawesome/fontawesome-free/css/all.css'
import '@fortawesome/fontawesome-free/js/all.js'

window.Vue = require('vue').default;


Vue.use(VueRouter)
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)

import store from './store/index';
import routes from './routes'
import App from './components/App.vue'
import Vue from 'vue';

const router = new VueRouter({
    routes
})

const app = new Vue({
    el: '#app',
    store,
    router,
    components: { App }
});
