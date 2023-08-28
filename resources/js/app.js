import Vue from 'vue'
import VueRouter from 'vue-router'

require('./bootstrap');
window.Vue = require('vue').default;
Vue.use(VueRouter)

import Form from 'vform'
window.Form = Form;
import HasError from 'vform'
import AlertError from 'vform'
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

let Fire = new Vue();
window.Fire = Fire;

// Import Alert
import Swal from 'sweetalert2'
window.Swal = Swal;
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});
window.Toast = Toast;

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


