<template>
  <v-app>
    <v-container grid-list-md fluid>
        <v-layout row>
          <v-flex xs2>
            <nav-component></nav-component>
          </v-flex>
          <v-flex xs10>
            <alert :message="alert.message"
                  :type="alert.type"
                  v-if="alert.type"></alert>
            <router-view></router-view>
          </v-flex>
        </v-layout>
    </v-container>
  </v-app>
</template>

<script>
import NavComponent from '@/components/NavComponent';
import Alert from '@/components/Alert';

export default {
  components: {
    NavComponent,
    Alert
  },
  computed: {},
  methods: {},
};
</script>
