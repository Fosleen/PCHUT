<template>
  <div id="app">
    <router-view></router-view>
    <Footer v-if="!isBlankLayout" />
  </div>
</template>

<script>
import Footer from "./Footer.vue";

export default {
  data() {
    return {
      isBlankLayout: false,
    };
  },
  watch: {
    $route(to, from) {
      this.updateIsBlankLayout(to);
    },
  },
  created() {
    this.updateIsBlankLayout(this.$route);
  },
  methods: {
    updateIsBlankLayout(route) {
      this.isBlankLayout = route.meta.layout === "blank";
    },
  },
};
</script>

<style lang="scss" scoped>
.content-wrapper {
  flex-grow: 1;
  width: 100%;
  position: relative;
}

.dashboard-layout-wrapper {
  width: 100vw;
  height: 100vh;
  max-width: 100vw;
  max-height: 100vh;
  overflow-x: hidden;
}

.main-section {
  display: flex;
  flex-direction: column;
  max-height: 1fr;
}
</style>
