<script>
    import Field from '@/models/Field';
    export default {
        name: 'FieldsComponent',
<<<<<<< HEAD

=======
>>>>>>> 8c281ca63b4ba2e1f3a974fd84f7565930920b67
        data: () => ({
          headers: [
            { text: 'ID', value: 'id' },
            { text: 'Title', value: 'title' },
            { text: 'Choices', value: 'has_choices' },
          ],
          fieldTypes: [],
        }),

        methods: {
          async getFields() {
            let response = await Field.get();
            this.fieldTypes = response.data;
          },
        },

        created() {
          this.getFields();
        }
    }
</script>

<template>
    <v-data-table
      :headers="headers"
      :items="fieldTypes"
      class="elevation-1"
    >
      <template slot="items" slot-scope="props">
        <td>{{ props.item.id }}</td>
        <td>{{ props.item.title }}</td>
        <td>{{ props.item.has_choices }}</td>
      </template>
    </v-data-table>
</template>

