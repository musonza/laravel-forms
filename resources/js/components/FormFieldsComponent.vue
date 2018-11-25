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

        async updateField(field) {
            field.save()
            .then(response => {
              this.alertWarning('Successfully updated the field!');
            })
            .catch(error => {
              this.alertError(this.formatErrorMessage(error.response));
            });
        },

        async getFormFields(formId) {
          this.formFields = await (new Form({'id': formId}))
            .fields()
            .$get();
        },

        async deleteField(field) {
          const confirmation = this.getConfirmationMessages().delete_field;
          this.alertConfirm(confirmation.message, async() => {
            field.delete()
            .then(response => {
              this.formFields.splice(this.formFields.indexOf(field), 1);
              this.alertWarning('Successfully deleted the field!');
            })
            .catch(error => {
              this.alertError(this.formatErrorMessage(error.response));
            });
          }, null, confirmation.title);
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
                {{ field.label }}
              </div>
              <v-card class="pl-2 pr-2 pt-2 pb-2">

                <v-text-field
                  outline
                  v-model="field.label"
                  label="Label"
                  data-vv-name="label"
                  @change="updateField(field)"
                ></v-text-field>

                <v-select
                  :items="getItems()"
                  label="Field Type"
                  v-model="field.field_type"
                  outline
                  @change="updateField(field)"
                ></v-select>

                <div class="right">
                  <v-card-actions>

                    <v-tooltip bottom class="mr-3">
                      <a slot="activator"><v-icon>file_copy</v-icon></a>
                      <span>Duplicate</span>
                    </v-tooltip>

                    <v-tooltip bottom>
                      <a slot="activator" @click="deleteField(field)">
                        <v-icon>delete</v-icon>
                      </a>
                      <span>Delete</span>
                    </v-tooltip>

                    <v-divider
                      class="mx-3"
                      inset
                      vertical
                    ></v-divider>

                    <v-switch
                      label="Required"
                      v-model="field.is_required"
                      @change="updateField(field)"
                    ></v-switch>
                  </v-card-actions>
                </div>

              </v-card>
            </v-expansion-panel-content>
        </v-expansion-panel>

      </div>
  </div>
</template>
