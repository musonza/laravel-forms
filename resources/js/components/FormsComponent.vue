<template>
    <v-data-table
      :headers="headers"
      :items="forms"
      class="elevation-1"
    >
      <template slot="items" slot-scope="props">
        <td>{{ props.item.id }}</td>
        <td>{{ props.item.title }}</td>
        <td>
          <v-chip label :color="props.item.status.class" text-color="white" class="font-weight-bold">
            {{ props.item.status.label }}
          </v-chip>
        </td>
        <td>{{ props.item.submissions_count }}</td>
        <td>
          <a><span>Preview</span></a> |
          <a @click="edit(props.item.id)"><span>Edit</span></a> |
          <a class="red--text"><span>Delete</span></a>
        </td>
      </template>
    </v-data-table>
</template>

<script>
    import Form from '@/models/Form';
    export default {
      name: 'FormsComponent',
        data: () => ({
          headers: [
            { text: 'ID', value: 'id' },
            { text: 'Title', value: 'title' },
            { text: 'Status', value: 'status.label', sortable: false },
            { text: 'Submissions', value: 'submissions_count' },
            { text: 'Actions', value: '', sortable: false },
          ],
          forms: [],
        }),
        methods: {
          async getForms() {
            let response = await Form.get();
            this.forms = response.data;
          },
          edit(id) {
            this.$router.push({name: 'forms-edit', params: { id: id}});
          }
        },
        created() {
          this.getForms();
        }
    }
</script>
