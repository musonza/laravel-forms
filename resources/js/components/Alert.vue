<script>
    import DialogComponent from '@/components/DialogComponent';
    export default {
      name: 'Alert',

      components: {
        DialogComponent,
      },

      data: () => ({
        timeout: null,
      }),

      props: {
        type: String,
        title: null,
        message: String,
        autoDismiss: Number,
        show: Boolean,
        confirmationAgree: null,
      },

      methods: {
        close(){
          clearTimeout(this.timeout);
          this.$root.alert.type = null;
        },
      },

      computed: {
        alert: function () {
          return this.$root.alert.show;
        }
      },

      mounted() {
        if (this.autoDismiss) {
          this.timeout = setTimeout(() => {
            this.close();
            this.dismissAlert();
          }, this.autoDismiss);
        }
      }
    }
</script>

<template>
  <div>
    <div v-if="type == 'confirmation'">
      <dialog-component
        :title="title"
        :message="message"
        :confirmationAgree="confirmationAgree"></dialog-component>
    </div>
    <div v-else>
      <v-alert
        :value="show"
        :type="type"
        transition="scale-transition"
      >
      {{ message }}
      </v-alert>
    </div>
  </div>
</template>
