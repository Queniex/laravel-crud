import Vue from 'vue'
import VueRouter from 'vue-router'

require('./bootstrap');
window.Vue = require('vue').default;
Vue.use(VueRouter)

let routes = [
    { path: '/data-user', component: require('./components/User/DataUser.vue').default },
    { path: '/data-level', component: require('./components/User/DataLevel.vue').default }
]

Vue.component('dashboard', require('./components/Dashboard.vue').default);

const router = new VueRouter({
    mode: 'history',
    routes
})

const app = new Vue({
    el: '#app',
    router
});


