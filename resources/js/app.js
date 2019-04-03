
require('./bootstrap');
import Vue from 'vue';
import VueRouter from 'vue-router';
window.Vue = require('vue');
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);


import TableUser from './admin/components/User/tableUser'
import EditUser from './admin/components/User/editUser'
import CreateUser from './admin/components/User/createUser'

import TableCategories from './admin/components/Category/tableCategory'
import Editcategory from './admin/components/Category/editCategory'
import CreateCategory from './admin/components/Category/createCategory'

const router = new VueRouter({
    base: '/admin',
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'table.users',
            component: TableUser,
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
        {
            path: '/categories',
            name: 'table.categories',
            component: TableCategories,
        },
        {
            path: '/category/create',
            name: 'create.category',
            component: CreateCategory,
        },
        {
            path: '/category/edit',
            name: 'edit.category',
            component: Editcategory,
        },
    ],
});

const app = new Vue({
    el: '#app',
    router,
});