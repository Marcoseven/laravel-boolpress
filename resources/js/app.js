/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter)

const Home = Vue.component("Home", require("./pages/Home.vue").default);
const Blog = Vue.component("Blog", require("./pages/Blog.vue").default);
const Shop = Vue.component("Shop",require("./pages/Shop.vue").default);
const Contacts = Vue.component("Contacts", require("./pages/Contacts.vue").default);
const _404 = Vue.component("404", require("./pages/404.vue").default);

const router = [
    {
        path: "/",
        name: "home",
        component: Home,
    },
    {
        path: "/blog",
        name: "blog",
        component: Blog,
    },
    {
        path: "/shop",
        name: "shop",
        component: Shop,
    },
    {
        path: "/contacts",
        name: "contacts",
        component: Contacts,
    },
    {
        path: "*",
        component: _404,
    },
];

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component("App", require("./App.vue").default);
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component(
    "posts-list",
    require("./components/PostsListComponent.vue").default
);
Vue.component(
    "post",
    require("./components/PostComponent.vue").default
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    router,
    el: '#app',
});
