<template>
  <div>
    <Navbar />
    <router-view></router-view>
    <Footer />
  </div>
</template>

<script setup>
import Navbar from "./Navbar.vue";
import Footer from "./Footer.vue";
</script>

<style lang="scss" scoped></style>
