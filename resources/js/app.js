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

const router = new VueRouter({
  routes: Routes,
  mode: 'history',
  base: '/laravel-forms/',
});

// Vue.component('alert', require('./components/Alert.vue'));

Vue.mixin(Base);

new Vue({
  el: '#laravel-forms',
  router,
  store,
  data() {
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