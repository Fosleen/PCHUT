<template>
  <div class="dashboard-layout-wrapper">
    <Navbar />

    <div class="main-section">
      <div class="content-wrapper">
        <router-view></router-view>
      </div>
      <Footer />
    </div>
  </div>
</template>

<script setup>
import Navbar from "./Navbar.vue";
import Footer from "./Footer.vue";
</script>

<style lang="scss" scoped>
.content-wrapper {
  flex-grow: 1;
  width: 100%;
  position: relative;
  background-color: red;
}

.dashboard-layout-wrapper {
  width: 100vw;
  height: 100vh;
  max-width: 100vw;
  max-height: 100vh;
  /* display: grid;
  grid-template-columns: auto 1fr; */
}

.main-section {
  display: flex;
  flex-direction: column;
  max-height: 1fr;
  overflow-y: scroll;
  /* padding: 24px; */
}
</style>
