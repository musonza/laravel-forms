<script>
    import Form from '@/models/Form';
    import Submission from '@/models/Submission';
    export default {
      name: 'FormSubmissionsComponent',

      data: () => ({
        formSubmissions: [],
        formId: null,
        currentSubmission: {},
        headers: [
          { text: 'ID', value: 'id' },
          { text: 'Created', value: 'created_at_readable' },
          { text: 'Status', value: 'is_complete' },
        ],
      }),

      methods: {

        async getFormSubmissions() {
          let form = new Form({id: this.formId});
          let response = await form.submissions().get();
          this.formSubmissions = response[0].submissions.data;
        },

        // store in vuex for current session
        async getSubmission(props) {
          props.expanded = !props.expanded;
          let form = new Form({id: this.formId});
          let response = await form.submissions().find(props.item.id);
          this.currentSubmission = response.submission;
        }

      },

      mounted() {
        this.formId = this.$route.params.id;
        this.getFormSubmissions();
      }
    }
</script>

<template>
    <v-data-table
      :headers="headers"
      :items="formSubmissions"
      class="elevation-1"
    >
      <template slot="items" slot-scope="props">
        <tr @click="getSubmission(props)">
          <td>{{ props.item.id }}</td>
          <td>{{ props.item.created_at_readable }}</td>
          <td>
            <v-chip
            label
            small
            :color="(props.item.is_complete) ? 'success' : 'warning'"
            text-color="white"
            class="status-label font-weight-bold ml-0">
              <span v-if="props.item.is_complete">Complete</span>
              <span v-else>In Progress</span>
            </v-chip>
          </td>
        </tr>
      </template>
      <template slot="expand" slot-scope="props">
        <v-card
          flat
          v-if="currentSubmission && currentSubmission.answers"
          class="pa-3"
        >
          <div
            v-for="(answer, i) in currentSubmission.answers.data"
            :key="i"
            class="pa-2"
            >
              <h3>{{ answer.question.label }}</h3>
              <span>{{ answer.response }}</span>
          </div>
        </v-card>
    </template>
    </v-data-table>
</template>
