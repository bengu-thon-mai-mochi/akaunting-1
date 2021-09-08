require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Apps from './Apps.vue';
import Home from './views/apps/Home.vue';
import MyApps from './views/apps/MyApps.vue';
import PaidApps from './views/apps/PaidApps.vue';
import NewApps from './views/apps/NewApps.vue';
import ApiKey from './views/apps/ApiKey.vue';

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
                    component: Home
                },
                {
                    path: 'my',
                    component: MyApps
                },
                {
                    path: 'paid',
                    component: PaidApps
                },
                {
                    path: 'new',
                    component: NewApps
                },
                {
                    path: 'api-key/create',
                    component: ApiKey
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
  render: h => h(Apps),
});
