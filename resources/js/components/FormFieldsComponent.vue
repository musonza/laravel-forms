<script>
    export default {
      name: 'FormFieldsComponent',

      data: () => ({
      }),

      methods: {
        addField() {
          this.$router.push({name: 'formFieldCreate', params: { id: this.$route.params.id}});
        }
      }
    }
</script>

<template>
  <div class="mt-3">
    <v-btn color="primary" small @click="addField()">Add Field</v-btn>
    <v-card class="pl-2 pr-2 pt-2 pb-2">
      <div>
        <h2>Fields</h2>
      </div>
    </v-card>
  </div>
</template>
