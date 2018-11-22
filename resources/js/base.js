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
      this.$root.alert.type = 'error';
      this.$root.alert.message = message;
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

    formatErrorMessage(response) {
      let message = '';
      if (response.data) {
        let data = response.data;
        message += data.message;

        if (data.errors) {
          for (let [key, value] of Object.entries(data.errors)) {
            message += ' ' + value;
            break;
          }
        }
      }
      return message;
    }
  }
};