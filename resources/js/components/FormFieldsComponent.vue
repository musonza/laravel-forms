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
        },

        //Move this to vuex state
        getItems(){
          return [
            'Musonza\\Form\\Fields\\CheckBox',
            'Musonza\\Form\\Fields\\Date',
            'Musonza\\Form\\Fields\\File',
            'Musonza\\Form\\Fields\\Password',
            'Musonza\\Form\\Fields\\Radio',
            'Musonza\\Form\\Fields\\Select',
            'Musonza\\Form\\Fields\\Text',
            'Musonza\\Form\\Fields\\TextArea',
            'Musonza\\Form\\Fields\\Email',
            'Musonza\\Form\\Fields\\Number',
          ];
        }

      },

      mounted() {
        this.getFormFields(this.$route.params.id);
      }
    }
</script>

<template>
  <div class="mt-3">
    <v-btn color="primary" small @click="addField()" class="right mb-3">Add Field</v-btn>
      <div>

        <h2>Fields</h2>

        <v-expansion-panel popout>
          <v-expansion-panel-content
              v-for="(field, i) in formFields"
              :key="i"
            >
              <div slot="header">
                <strong>#{{ field.id }}</strong>
                {{ field.title }}
              </div>
              <v-card class="pl-2 pr-2 pt-2 pb-2">

                <v-text-field
                  outline
                  v-model="field.title"
                  label="Label"
                  data-vv-name="label"
                ></v-text-field>

                <v-select
                  :items="getItems()"
                  label="Field Type"
                  v-model="field.field_type"
                  outline
                ></v-select>

                <v-switch
                  label="Required"
                  v-model="field.is_required"
                ></v-switch>
              </v-card>
            </v-expansion-panel-content>
        </v-expansion-panel>

      </div>
  </div>
</template>
