require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Apps from './Apps.vue';
import AppStoreSPALayout from './AppStoreSPALayout.vue';
import Home from './views/apps/Home.vue';
import MyApps from './views/apps/MyApps.vue';
import PaidApps from './views/apps/PaidApps.vue';
import NewApps from './views/apps/NewApps.vue';
import ApiKey from './views/apps/ApiKey.vue';
import AppDetail from './views/apps/AppDetail.vue';
import Vendors from './views/apps/Vendors.vue';
import Search from './views/apps/Vendors.vue';
import Categories from './views/apps/Categories.vue';

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
                    component: Home
                },
                {
                    path: 'categories/:category',
                    name: 'categories',
                    component: Categories
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
                    props: route => ({ query: route.query.q })
                },
                {
                    path: 'new',
                    name: 'new',
                    component: NewApps,
                },
                {
                    path: 'search',
                    name: 'search',
                    component: Search,
                },
                {
                    path: 'vendors/:vendorname',
                    name: 'vendors',
                    component: Vendors,
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
  el    : '#main-body',
  router,
  render: h => h(AppStoreSPALayout),
});
