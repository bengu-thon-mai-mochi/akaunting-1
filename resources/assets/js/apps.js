require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import DashboardPlugin from './plugins/dashboard-plugin';

Vue.use(VueRouter);
Vue.use(DashboardPlugin);

import Apps from './Apps.vue';
import AppStoreSPALayout from './AppStoreSPALayout.vue';
import Home from './views/apps/Home.vue';

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
const Docs = () => import('./views/apps/Docs.vue');

var global_path = new URL(url).protocol + '//' + window.location.host;
var base_path = url.replace(global_path, '');

const router = new VueRouter({
    mode: 'history',
    base: base_path,

    routes: [
        {
            path: '/:',
            component: Apps,
            props: {
                translations: module_translations,
                categories: app_categories,
            },
        },
        {
            path: '/apps',
            component: Apps,
            props: {
                translations: module_translations,
                categories: app_categories,
                url: url
            },
            
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
                    path: 'docs/:appName',
                    name: 'docs',
                    component: Docs
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
                    components: {  
                        default: Vendors,
                        paginationHelper: PaginationLayout
                    },
                },
                {
                    path: 'search',
                    name: 'search',
                    components: {  
                        default: Search,
                        paginationHelper: PaginationLayout
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
                    component: AppDetail,
                },
            ],
        },

    { 
            path: '/:', 
            redirect: '/apps/home',
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

router.beforeEach((to, from, next) => {
    const apiKey = true;
    if (to.name === 'home' && !apiKey) next({ name: 'apiKey' })
    else next()
})

new Vue({
  el    : '#main-body',
  router,
  render: h => h(AppStoreSPALayout),
});
