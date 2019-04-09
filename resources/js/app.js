
require('./bootstrap');
import Vue from 'vue';
import VueRouter from 'vue-router';
window.Vue = require('vue');
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);

import _ from "lodash";
import SortedTablePlugin from "vue-sorted-table";

Vue.prototype.$_ = _;
Vue.use(SortedTablePlugin);
Vue.config.productionTip = false;

import CKEditor from '@ckeditor/ckeditor5-vue';
Vue.use(CKEditor);

import Profile from './admin/components/User/proFile'
import TableUser from './admin/components/User/tableUser'
import EditUser from './admin/components/User/editUser'
import CreateUser from './admin/components/User/createUser'

import TableCategories from './admin/components/Category/tableCategory'
import EditCategory from './admin/components/Category/editCategory'
import CreateCategory from './admin/components/Category/createCategory'

import TableNews from './admin/components/News/tableNews'
import EditNews from './admin/components/News/editNews'
import CreateNews from './admin/components/News/createNews'

import Test from './admin/components/News/test'

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
            path: '/profile',
            name: 'profile.user',
            component: Profile,
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
            component: EditCategory,
        },
        {
            path: '/news',
            name: 'table.news',
            component: TableNews,
        },
        {
            path: '/news/edit',
            name: 'edit.news',
            component: EditNews,
        },
        {
            path: '/news/create',
            name: 'create.news',
            component: CreateNews,
        },
        {
            path: '/test',
            name: 'test.test',
            component: Test,
        },
    ],
});

const app = new Vue({
    el: '#app',
    router,
});