import _ from 'lodash';
import moment from 'moment-timezone';

export default {
  computed: {
  },

  methods: {
    /**
     * Show an error message.
     */
    alertError(message) {
    },


    /**
     * Show a success message.
     */
    alertSuccess(message, autoClose) {
      this.$root.alert.type = 'success';
      this.$root.alert.message = message;
    },


    /**
     * Show confirmation message.
     */
    alertConfirm(message, success, failure) {
    },
  }
};