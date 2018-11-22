<script>
    import Form from '@/models/Form';
    import FormActionsComponent from "@/components/FormActionsComponent";
    export default {
      name: 'FormEditPage',

      $_veeValidate: {
        validator: 'new'
      },

      components: {
        FormActionsComponent
      },

      data: () => ({
        payload: {
          title: '',
          description: '',
          status: null,
        },
        formModel: {},
      }),

      methods: {
        async getForm(id) {
          this.formModel = await Form.find(id);
          this.payload = {
            'title': this.formModel.title,
            'description': this.formModel.description,
            'status': parseInt(this.formModel.status.value)
          };
        },
        async submit () {
          let valid = await this.$validator.validateAll();
          if (valid) {
            let response = await this.formModel
                .sync(this.payload)
                .then(response => {
                  this.alertSuccess('Successfully saved!');
                }).catch(error => {
                  this.alertError(this.formatErrorMessage(error.response));
                });
          }
        },
        clear () {
          this.title = ''
          this.description = ''
          this.status = null
          this.$validator.reset()
        },
      },

      mounted() {
        const id = this.$route.params.id;
        if (id) {
          this.getForm(id);
        }
      },
    }
</script>

<template>
  <div>
  <!-- <form-actions-component></form-actions-component> -->
  <v-card class="pl-2 pr-2 pt-2 pb-2">
    <h1 id="introduction" class="primary--text mb-1" v-if="formModel.id">Form #{{ formModel.id }}</h1>

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
        <!-- <v-btn @click="clear">clear</v-btn> -->
      </form>

    </v-card>
  </div>
</template>
