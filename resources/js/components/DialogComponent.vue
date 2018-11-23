<script>
    export default {
      name: 'DialogComponent',

      data: () => ({
      }),

      props: {
        type: String,
        title: null,
        message: String,
        show: Boolean,
        confirmationAgree: null
      },

      methods: {
        confirm() {
          this.confirmationAgree();
          this.dismissAlert();
        }
      },

      computed: {
        alert: function () {
          return this.$root.alert.show;
        }
      },

      mounted() {
      }
    }
</script>

<template>
  <div>
    <v-dialog
      v-model="alert"
      max-width="400"
    >
      <v-card>
        <v-card-title class="headline">
          {{ title }}
        </v-card-title>
        <v-card-text>
          {{ message }}
        </v-card-text>

        <v-card-actions>
          <v-spacer></v-spacer>

          <v-btn
            color="green darken-1"
            flat="flat"
            @click="dismissAlert()"
          >
            Cancel
          </v-btn>

          <v-btn
            color="red darken-1"
            flat="flat"
            @click="confirm()"
          >
            Delete
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>
