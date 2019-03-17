const axios = require('axios');

const state = {
  forms: null
};

const getters = {
  forms: state => {
    return state.forms;
  }
};

const BASEURL = ''; //http://127.0.0.1:8000';

const actions = {
  loadForms({ commit }) {
    commit('LOADING', true);
    axios.get(BASEURL + '/forms')
      .then((response) => {
        commit('SET_FORMS', response.data);
        commit('LOADING', false);
        return response;
      });
  },
};

const mutations = {
  ['LOADING'](state, payload) {
    state.loading = payload;
  },
  ['SET_FORMS'](state, payload) {
    state.forms = payload;
  },
};

export default {
  state,
  getters,
  actions,
  mutations,
};