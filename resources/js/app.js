import Vue from 'vue'
import Base from './base'
import axios from 'axios';
import Routes from './routes'
import VueRouter from 'vue-router'
import TreeView from 'vue-json-tree-view'
import moment from 'moment-timezone';

require('bootstrap');

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
}

Vue.use(VueRouter);
Vue.use(TreeView);

moment.tz.setDefault(Telescope.timezone);

const router = new VueRouter({
    routes: Routes,
    mode: 'history',
    base: '/' + window.Telescope.path + '/',
});

Vue.component('alert', require('./components/Alert.vue'));

Vue.mixin(Base);

new Vue({
    el: '#laravel-forms',

    router,

    data(){
        return {
            alert: {
                type: null,
                autoClose: 0,
                message: '',
                confirmationProceed: null,
                confirmationCancel: null,
            },
        }
    },
});