<script>
import Form from "@/models/Form";
export default {
  name: "FormsComponent",
  data: () => ({
    headers: [
      { text: "ID", value: "id" },
      { text: "Title", value: "title" },
      { text: "Status", value: "status.label", sortable: false },
      { text: "Submissions", value: "submissions_count" },
      { text: "", value: "", sortable: false }
    ],
    forms: []
  }),

  methods: {
    async getForms() {
      this.forms = await Form.$get();
    },

    previewForm(form) {
      window.open(`/forms/${form.id}/submissions/create`, "_blank");
    },

    editForm(form) {
      this.$router.push({ name: "forms-edit", params: { id: form.id } });
    },

    deleteForm(form) {
      const confirmation = this.getConfirmationMessages().delete_form;
      this.alertConfirm(
        confirmation.message,
        async () => {
          let formModel = await Form.find(form.id);
          formModel
            .delete()
            .then(response => {
              this.forms.splice(this.forms.indexOf(form), 1);
              this.alertWarning("Successfully deleted the form!");
            })
            .catch(error => {
              this.alertError(this.formatErrorMessage(error.response));
            });
        },
        null,
        confirmation.title
      );
    },

    newForm() {
      this.$router.push({ name: "forms-edit", params: { id: 0 } });
    }
  },

  created() {
    this.getForms();
  }
};
</script>

<template>
  <div>
    <v-btn color="primary" class="right" @click="newForm()">Create Form</v-btn>
    <v-data-table :headers="headers" :items="forms" class="elevation-1">
      <template slot="items" slot-scope="props">
        <td>{{ props.item.id }}</td>
        <td>{{ props.item.title }}</td>
        <td>
          <v-chip
            label
            small
            :color="props.item.status.class"
            text-color="white"
            class="status-label font-weight-bold ml-0"
          >{{ props.item.status.label }}</v-chip>
        </td>
        <td>{{ props.item.submissions_count }}</td>
        <td>
          <v-icon small class="mr-2" @click="previewForm(props.item)">visibility</v-icon>

          <v-icon small color="blue" class="mr-2" @click="editForm(props.item)">edit</v-icon>

          <v-icon small color="red" @click="deleteForm(props.item)">delete</v-icon>
        </td>
      </template>
    </v-data-table>
  </div>
</template>
