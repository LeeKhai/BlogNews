
require('./bootstrap');
import Vue from 'vue';
import VueRouter from 'vue-router';
window.Vue = require('vue');
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);

import Test from './admin/components/News/test'

const router = new VueRouter({
    base: '/',
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'test',
            component: Test,
        },
    ]
});

const app = new Vue({
    el: '#welcome',
    router,
});