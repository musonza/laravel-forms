<script>
import Form from "@/models/Form";
import Sortable from "sortablejs";

export default {
  name: "FormFieldsComponent",

  data: () => ({
    formFields: null,
    items: []
  }),

  props: ["formModel"],

  methods: {
    remove(item, field) {
      field.options.splice(field.options.indexOf(item), 1);
      field.options = [...field.options];
    },

    addField() {
      this.$router.push({
        name: "formFieldCreate",
        params: { id: this.$route.params.id }
      });
    },

    async updateField(field) {
      field
        .save()
        .then(response => {
          field = response;
          this.alertSuccess("Successfully updated the field!");
        })
        .catch(error => {
          this.alertError(this.formatErrorMessage(error.response));
        });
    },

    async getFormFields() {
      this.formFields = await new Form({ id: this.formId }).fields().$get();
    },

    async deleteField(field) {
      const confirmation = this.getConfirmationMessages().delete_field;
      this.alertConfirm(
        confirmation.message,
        async () => {
          field
            .delete()
            .then(response => {
              this.formFields.splice(this.formFields.indexOf(field), 1);
              this.alertWarning("Successfully deleted the field!");
            })
            .catch(error => {
              this.alertError(this.formatErrorMessage(error.response));
            });
        },
        null,
        confirmation.title
      );
    },

    //Move this to vuex state
    getItems() {
      return [
        "Musonza\\Form\\Fields\\CheckBox",
        "Musonza\\Form\\Fields\\Date",
        "Musonza\\Form\\Fields\\File",
        "Musonza\\Form\\Fields\\Password",
        "Musonza\\Form\\Fields\\Radio",
        "Musonza\\Form\\Fields\\Select",
        "Musonza\\Form\\Fields\\Text",
        "Musonza\\Form\\Fields\\TextArea",
        "Musonza\\Form\\Fields\\Email",
        "Musonza\\Form\\Fields\\Number"
      ];
    }
  },

  mounted() {
    this.formId = this.$route.params.id;
    this.getFormFields();
    let fieldsList = document.querySelector("#form-fields-list");
    const _self = this;
    Sortable.create(fieldsList, {
      ghostClass: "sortable-ghost",
      sort: true,
      handle: ".sorting-handle",
      onEnd({ newIndex, oldIndex }) {
        if (newIndex == oldIndex) {
          return;
        }
        const fieldSelected = _self.formFields.splice(oldIndex, 1)[0];
        _self.formFields.splice(newIndex, 0, fieldSelected);
        fieldSelected.position = fieldSelected.position + (newIndex - oldIndex);
        fieldSelected.save().then(resp => {
          // _self.$router.go();
          // _self.$forceUpdate();
          _self.$router.go();
        });
      }
    });
  }
};
</script>

<template>
  <div class="mt-3">
    <v-btn color="primary" small @click="addField()" class="right mb-3">Add Field</v-btn>
    <div>
      <h2>Fields</h2>

      <v-expansion-panel popout id="form-fields-list">
        <v-expansion-panel-content
          v-for="(field, i) in formFields"
          :key="i"
          class="fields-expansion-panel"
        >
          <div slot="header">
            <div class="left">
              <span class="sorting-handle">:::</span>
              {{ field.label }}
            </div>
          </div>

          <v-card class="pl-2 pr-2 pt-2 pb-2">
            <!-- move / refactor this -->
            <div class>
              <v-card-actions>
                <v-tooltip bottom class="mr-3">
                  <a slot="activator" @click="updateField(field)">
                    <v-icon>save</v-icon>
                  </a>
                  <span>Save</span>
                </v-tooltip>
              </v-card-actions>
            </div>
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

            <!-- Choices -->
            <div v-if="field.has_choices">
              <template>
                <v-combobox
                  v-model="field.options"
                  :items="items"
                  label="Choices"
                  chips
                  clearable
                  solo
                  multiple
                >
                  <template slot="selection" slot-scope="data">
                    <v-chip :selected="data.selected" close @input="remove(data.item, field)">
                      <strong>{{ data.item }}</strong>&nbsp;
                    </v-chip>
                  </template>
                </v-combobox>
              </template>
            </div>
            <!-- Choices -->
            <v-card-actions>
              <v-tooltip bottom class="mr-3">
                <a slot="activator">
                  <v-icon>file_copy</v-icon>
                </a>
                <span>Duplicate</span>
              </v-tooltip>

              <v-tooltip bottom>
                <a slot="activator" @click="deleteField(field)">
                  <v-icon>delete</v-icon>
                </a>
                <span>Delete</span>
              </v-tooltip>

              <v-divider class="mx-3" inset vertical></v-divider>

              <v-switch label="Required" v-model="field.is_required" @change="updateField(field)"></v-switch>
            </v-card-actions>
          </v-card>
        </v-expansion-panel-content>
      </v-expansion-panel>
    </div>
  </div>
</template>

<style>
.sorting-handle {
  max-width: 30px;
  cursor: move !important;
  cursor: -webkit-grabbing !important;
  font-weight: bolder;
}
.sortable-ghost {
  border: thick solid #3477cb;
}
</style>

