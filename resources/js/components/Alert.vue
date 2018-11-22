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
      }),

      props: {
        type: String,
        message: String,
      },

      methods: {
        goTo(link) {
          this.$router.push(link);
        }
      }
    }
</script>

<template>
  <div>
    <v-alert
      :value="true"
      type="type"
      transition="scale-transition"
    >
    {{ message }}
    </v-alert>
  </div>
</template>
