require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Apps from './Apps.vue';
import AppStoreSPALayout from './AppStoreSPALayout.vue';
import Home from './views/apps/Home.vue';
//import MyApps from './views/apps/MyApps.vue';
//import PaidApps from './views/apps/PaidApps.vue';
//import NewApps from './views/apps/NewApps.vue';
//import FreeApps from './views/apps/FreeApps.vue';
//import ApiKey from './views/apps/ApiKey.vue';
//import AppDetail from './views/apps/AppDetail.vue';
//import Vendors from './views/apps/Vendors.vue';
//import Search from './views/apps/Search.vue';
//import Categories from './views/apps/Categories.vue';
//import PaginationLayout from './views/apps/PaginationLayout.vue';

const Search  = () => import('./views/apps/Search.vue');
const Categories = () => import('./views/apps/Categories.vue');
const NewApps = () => import('./views/apps/NewApps.vue');
const FreeApps  = () => import('./views/apps/FreeApps.vue');
const ApiKey= () => import('./views/apps/ApiKey.vue');
const MyApps = () => import('./views/apps/MyApps.vue');
const PaidApps = () => import('./views/apps/PaidApps.vue');
const AppDetail = () => import('./views/apps/AppDetail.vue');
const Vendors = () => import('./views/apps/Vendors.vue');
const PaginationLayout = () => import('./views/apps/PaginationLayout.vue');

var global_path = new URL(url).protocol + '//' + window.location.host;
var base_path = url.replace(global_path, '');

const router = new VueRouter({
    mode: 'history',
    base: base_path,

    routes: [
        {
            path: '/apps',
            component: Apps,
            children: [
                {
                    path: 'home',
                    name: 'home',
                    components: {  
                        default: Home,
                        helper: PaginationLayout
                    },
                },
                {
                    path: 'categories/:category',
                    name: 'categories',
                    components: {  
                        default: Categories,
                        paginationHelper: PaginationLayout
                    },
                },
                {
                    path: 'my',
                    name: 'my',
                    component: MyApps
                },
                {
                    path: 'paid',
                    name: 'paid',
                    component: PaidApps,
                    components: {  
                        default: PaidApps,
                        paginationHelper: PaginationLayout
                    },
                    props: route => ({ query: route.query.q })
                },
                {
                    path: 'new',
                    name: 'new',
                    components: {  
                        default: NewApps,
                        paginationHelper: PaginationLayout
                    },
                },
                {
                    path: 'free',
                    name: 'free',
                    components: {  
                        default: FreeApps,
                        paginationHelper: PaginationLayout
                    },
                },
                {
                    path: 'vendors/:vendorname',
                    name: 'vendors',
                    component: Vendors,
                },
                {
                    path: 'search',
                    name: 'search',
                    components: { default: Search,  search: Search },
                    props: {
                        default: true,
                        search: route => ({ keyword: route.query.q })
                    },
                },
                {
                    path: 'api-key/create',
                    name: 'apiKey',
                    component: ApiKey,
                },
                {
                    path: ':appName',
                    name: 'appDetail',
                    component: AppDetail
                },
            ],
        },
    ],

    linkActiveClass: 'active',

    scrollBehavior: (to, from ,savedPosition) => {
        if (savedPosition) {
           return savedPosition;
        }

        if (to.hash) {
            return { selector: to.hash };
        }

        return { x: 0, y: 0 };
    }
});

new Vue({
  el    : '#app',
  router,
  render: h => h(AppStoreSPALayout),
});
