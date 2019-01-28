<script>
import Form from "@/models/Form";
import FormActionsComponent from "@/components/FormActionsComponent";
import FormFieldsComponent from "@/components/FormFieldsComponent";
import FormSubmissionsComponent from "@/components/FormSubmissionsComponent";
import { EventBus } from "../../event-bus.js";
export default {
  name: "FormEditPage",
  $_veeValidate: {
    validator: "new"
  },

  components: {
    FormActionsComponent,
    FormFieldsComponent,
    FormSubmissionsComponent
  },

  data: () => ({
    payload: {
      title: "",
      description: "",
      status: null
    },
    formModel: {
      submissions_count: 0
    },
    creatingForm: true,
    panel: [true]
  }),
  methods: {
    async getForm(id) {
      this.formModel = await Form.find(id);
      this.payload = {
        title: this.formModel.title,
        description: this.formModel.description,
        status: parseInt(this.formModel.status.value)
      };
    },

    async submit() {
      let valid = await this.$validator.validateAll();
      if (valid) {
        this.formModel.id ? this.updateForm() : this.createForm();
      }
    },

    async createForm() {
      this.payload.status = 0;
      let form = new Form(this.payload);
      form
        .save()
        .then(response => {
          this.alertSuccess("Successfully created!");
          this.$router.push({
            name: "forms-edit",
            params: { id: response.id }
          });
          this.$router.go();
        })
        .catch(error => {
          this.alertError(this.formatErrorMessage(error.response));
        });
    },

    async updateForm() {
      await this.formModel
        .sync(this.payload)
        .then(response => {
          this.alertSuccess("Successfully saved!");
        })
        .catch(error => {
          this.alertError(this.formatErrorMessage(error.response));
        });
    },

    clear() {
      this.title = "";
      this.description = "";
      this.status = null;
      this.$validator.reset();
    },

    cancel() {
      this.$router.go(-1);
    }
  },

  created() {
    EventBus.$on("delete_submission", () => {
      this.formModel.submissions_count--;
    });
  },
  created() {
    EventBus.$on("delete_submission", () => {
      this.formModel.submissions_count--;
    });
  },

  mounted() {
    const id = this.$route.params.id;
    if (id && id != 0) {
      this.creatingForm = false;
      this.getForm(id);
    }
  }
};
</script>

<template>
  <div>
    <h2 class="primary--text mb-1" v-if="formModel.id">Form #{{ formModel.id }}</h2>
    <h2 class="primary--text mb-1" v-else>New Form</h2>
    <v-tabs fixed-tabs>
      <v-tab>Fields</v-tab>
      <v-tab>
        <span class="mr-2">Submissions</span>
        <v-badge right>
          <span slot="badge">{{ formModel.submissions_count }}</span>
        </v-badge>
      </v-tab>
      <!-- <v-tab>Settings</v-tab> -->
      <v-tabs-items>
        <v-tab-item>
          <v-expansion-panel v-model="panel" expand>
            <v-expansion-panel-content>
              <div slot="header">
                <h2 class="primary--text mb-1" v-if="formModel.id">Details</h2>
              </div>
              <v-card class="pl-2 pr-2 pt-2 pb-2">
                <form>
                  <v-text-field
                    outline
                    v-validate="'required'"
                    v-model="payload.title"
                    :error-messages="errors.collect('title')"
                    label="Title"
                    data-vv-name="title"
                    required
                  ></v-text-field>

                  <v-textarea
                    outline
                    v-model="payload.description"
                    name="description"
                    label="Description"
                  ></v-textarea>

                  <v-radio-group v-model="payload.status">
                    <v-radio
                      v-for="(status, index) in formModel.statuses"
                      :key="index"
                      :label="`${status.label}`"
                      :value="index"
                    ></v-radio>
                  </v-radio-group>

                  <v-btn @click="submit" color="primary">save</v-btn>
                  <v-btn @click="cancel">cancel</v-btn>
                  <!-- <v-btn @click="clear">clear</v-btn> -->
                </form>
              </v-card>
            </v-expansion-panel-content>
          </v-expansion-panel>
          <form-fields-component :form-model="formModel" v-if="!creatingForm"></form-fields-component>
        </v-tab-item>
        <v-tab-item v-if="formModel.id">
          <form-submissions-component></form-submissions-component>
        </v-tab-item>
        <!-- <v-tab-item v-if="formModel.id">Settings here...</v-tab-item> -->
      </v-tabs-items>
    </v-tabs>
  </div>
</template>
