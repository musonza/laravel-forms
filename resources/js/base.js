export default {
  methods: {
    /**
     * Show an error message.
     */
    alertError(message) {
      this.$root.alert.type = 'error';
      this.$root.alert.message = message;
      this.$root.alert.show = true;
    },

    alertWarning(message) {
      this.$root.alert.type = 'warning';
      this.$root.alert.message = message;
      this.$root.alert.show = true;
    },

    /**
     * Show a success message.
     */
    alertSuccess(message, autoClose) {
      this.$root.alert.type = 'success';
      this.$root.alert.message = message;
      this.$root.alert.show = true;
    },

    /**
     * Show confirmation message.
     */
    alertConfirm(message, success, failure, title) {
      this.$root.alert.type = 'confirmation';
      this.$root.alert.autoClose = false;
      this.$root.alert.title = title;
      this.$root.alert.message = message;
      this.$root.alert.confirmationAgree = success;
      this.$root.alert.confirmationCancel = failure;
      this.$root.alert.show = true;
    },

    dismissAlert() {
      this.$root.alert.show = false;
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
    },

    getConfirmationMessages() {
      return {
        'delete_form': {
          'title': 'Delete Form',
          'message': 'Are you sure you want to delete this form? This action cannot be undone.'
        },
        'delete_field': {
          'title': 'Delete Field',
          'message': 'Are you sure you want to delete this field? This action cannot be undone.'
        },
        'delete_submission': {
          'title': 'Delete Submission',
          'message': 'Are you sure you want to delete this submission? This action cannot be undone.'
        },
      }
    }
  }
};