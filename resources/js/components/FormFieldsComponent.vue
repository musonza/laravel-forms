<script>
    import Form from '@/models/Form';
    export default {
      name: 'FormFieldsComponent',

      data: () => ({
        formFields: null,
      }),

      props: ['formModel'],

      methods: {
        addField() {
          this.$router.push({name: 'formFieldCreate', params: { id: this.$route.params.id}});
        },

        async getFormFields(formId) {
          let form = await Form.find(formId);
          let fields = await form.fields().get();
          this.formFields = fields.data;
        }

      },

      mounted() {
        this.getFormFields(this.$route.params.id);
      }
    }
</script>

<template>
  <div class="mt-3">
    <v-btn color="primary" small @click="addField()">Add Field</v-btn>
    <v-card class="pl-2 pr-2 pt-2 pb-2">
      <div>
        <h2>Fields</h2>
        <div v-for="field in formFields" :key="field.id">
          <label>{{ field.title }}</label>
          <div v-html="field.render"></div>
        </div>
      </div>
    </v-card>
  </div>
</template>

<style>
.form-control {
  display: block;
  width: 100%;
  height: calc(2.25rem + 2px);
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  line-height: 1.5;
  color: #495057;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  border-radius: 0.25rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
label {
  padding-top: calc(0.375rem + 1px);
  padding-bottom: calc(0.375rem + 1px);
  margin-bottom: 0;
  font-size: inherit;
  line-height: 1.5;
}
</style>
