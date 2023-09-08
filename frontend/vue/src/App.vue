<template>
  <div id="app">
    <component :is="layoutComponent">
      <router-view></router-view>
    </component>
  </div>
</template>

<script>
import MainLayout from "./components/MainLayout.vue";
import BlankLayout from "./components/BlankLayout.vue";

export default {
  computed: {
    layoutComponent() {
      if (this.$route.path === "/register" || this.$route.path === "/login") {
        return BlankLayout;
      } else {
        return MainLayout;
      }
    },
  },
};
</script>
