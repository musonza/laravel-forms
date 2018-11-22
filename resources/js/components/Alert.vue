<script>
    export default {
      name: 'NavComponent',

      data: () => ({
        items: [
          { title: 'Dashboard', icon: 'dashboard', link: '/'},
          { title: 'Forms', icon: 'list', link: '/forms' },
          { title: 'Field Types', icon: 'text_fields', link: '/forms' },
          { title: 'Settings', icon: 'settings', link: '/settings' }
        ],
        alert: true,
        timeout: null,
      }),

      props: {
        type: String,
        message: String,
        autoDismiss: Number
      },

      methods: {
        close(){
          console.log(this.timeout);
          clearTimeout(this.timeout);
          this.alert = false;
        },
      },

      mounted() {
        if (this.autoDismiss && this.type == 'success') {
          this.timeout = setTimeout(() => {
            this.close();
          }, this.autoDismiss);
        }
      }
    }
</script>

<template>
  <div>
    <v-alert
      :value="alert"
      :type="type"
      transition="scale-transition"
    >
    {{ message }}
    </v-alert>
  </div>
</template>
