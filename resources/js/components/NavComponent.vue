<script>
export default {
  name: "NavComponent",

  data: () => ({
    items: [
      // { title: 'Dashboard', icon: 'dashboard', link: '/'},
      { title: "Forms", icon: "list", link: "/forms" },
      { title: "Field Types", icon: "text_fields", link: "/fields" }
      // { title: "Settings", icon: "settings", link: "/settings" }
    ]
  }),

  methods: {
    goTo(link) {
      this.$router.push(link);
    }
  }
};
</script>

<template>
  <div>
    <v-navigation-drawer class="blue-grey darken-3" dark permanent>
      <v-list>
        <v-list-tile v-for="item in items" :key="item.title" @click="goTo(item.link)">
          <v-list-tile-action>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-tile-action>

          <v-list-tile-content>
            <v-list-tile-title>{{ item.title }}</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
    </v-navigation-drawer>
  </div>
</template>
