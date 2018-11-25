<script>
    import Field from '@/models/Field';
    export default {
        name: 'FieldsComponent',
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
            this.fieldTypes = await Field.$get();
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

