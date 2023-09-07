<template>
  <div class="dashboard-layout-wrapper">
    <div class="main-section">
      <div class="content-wrapper">
        <Header />

        <router-view></router-view>
        <Footer />
      </div>
    </div>
  </div>
</template>

<script setup>
import Footer from "./Footer.vue";
import Header from "./Header.vue";
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
