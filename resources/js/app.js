
require('./bootstrap');
import Vue from 'vue';
import VueRouter from 'vue-router';
window.Vue = require('vue');
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);


import Table from './admin/components/tableUser'
import EditUser from './admin/components/editUser'
import CreateUser from './admin/components/createUser'

const router = new VueRouter({
    base: '/admin',
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'table.list',
            component: Table,
        },
        {
            path: '/edit',
            name: 'edit.user',
            component: EditUser,
        },
        {
            path: '/create',
            name: 'create.user',
            component: CreateUser,
        },
    ],
});

const app = new Vue({
    el: '#app',
    router,
});