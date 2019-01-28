import Vue from 'vue';
import Base from './base';
import axios from 'axios';
import Routes from './routes';
import VueRouter from 'vue-router';
import TreeView from 'vue-json-tree-view';
import store from './store/index';
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';
import { Model } from 'vue-api-query';
import VeeValidate from 'vee-validate'

// inject global axios instance as http client to Model
Model.$http = axios
require('bootstrap');
let token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
  axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
}

Vue.use(Vuetify);
Vue.use(VueRouter);
Vue.use(TreeView);
Vue.use(VeeValidate);

Vue.component('nav-component', require('./components/NavComponent.vue'));
Vue.component('alert', require('./components/Alert.vue'));

const router = new VueRouter({
  routes: Routes,
  // mode: 'history',
  base: '/laravel-forms/',
});

Vue.mixin(Base);

new Vue({
  el: '#laravel-forms',
  router,
  store,
  // render: (h) => h(App),
  data() {
    return {
      alert: {
        type: null,
        show: false,
        autoDismiss: 5000,
        message: '',
        title: '',
        confirmationAgree: null,
      },
    }
  },
});