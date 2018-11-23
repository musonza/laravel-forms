<script>
    import Field from '@/models/Field';
    export default {

      $_veeValidate: {
        validator: 'new'
      },

      data: () => ({
        fieldTypes: null,
        payload: {
          field_type: '',
          label: '',
        },
      }),

      methods: {
        async getFieldTypes() {
          let response = await Field.get();
          this.fieldTypes = response.data;
        },

        getItems() {
          let items = [];
          for (let f of this.fieldTypes) {
            items.push(f.id);
          }
          return items;
        },

        cancel() {
          this.$router.go(-1);
        },

        async submit () {
          let valid = await this.$validator.validateAll();
          if (valid) {
            alert('cool');
          } else {
            this.alertError('Invalid input provided');
          }
        },
      },

      mounted() {
        this.getFieldTypes();
      },
    }
</script>

<template>
  <v-card class="pl-2 pr-2 pt-2 pb-2">
    <h1 class="primary--text mb-1">New Field</h1>
    <div v-if="fieldTypes">
      <form>

      <v-select
        :items="getItems()"
        label="Field Type"
        v-model="payload.field_type"
        :error-messages="errors.collect('field_type')"
        v-validate="'required'"
        outline
      ></v-select>

      <v-text-field
        outline
        v-validate="'required'"
        v-model="payload.label"
        :error-messages="errors.collect('label')"
        label="Label"
        data-vv-name="label"
        required
      ></v-text-field>

      <v-btn @click="submit" color="primary">save</v-btn>
      <v-btn @click="cancel">cancel</v-btn>

      </form>
    </div>
  </v-card>
</template>
