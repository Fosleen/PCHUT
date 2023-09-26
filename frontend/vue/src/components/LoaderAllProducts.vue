<template>
  <div>
    <content-loader
      viewBox="0 0 400 160"
      :speed="2"
      primaryColor="#e6e6e6"
      secondaryColor="#ecebeb"
      v-if="isTabletLarge"
    >
      <rect x="4" y="4" rx="2" ry="2" width="93" height="148" />
      <rect x="104" y="4" rx="2" ry="2" width="93" height="148" />
      <rect x="203" y="4" rx="2" ry="2" width="93" height="148" />
      <rect x="303" y="4" rx="2" ry="2" width="93" height="148" />
    </content-loader>
    <content-loader
      viewBox="0 0 202 500"
      :speed="2"
      primaryColor="#e6e6e6"
      secondaryColor="#ecebeb"
      v-if="!isTabletLarge"
    >
      <rect x="4" y="4" rx="2" ry="2" width="93" height="180" />
      <rect x="104" y="4" rx="2" ry="2" width="93" height="180" />
      <rect x="4" y="190" rx="200" ry="2" width="93" height="180" />
      <rect x="104" y="190" rx="2" ry="2" width="93" height="180" />
    </content-loader>
  </div>
</template>
<script setup>
import { ContentLoader } from "vue-content-loader";
import { onMounted, onBeforeUnmount } from "vue";

let isTabletLarge = window.innerWidth > 768;

const updateMedia = () => {
  isTabletLarge = window.innerWidth > 1050;
};

onMounted(() => {
  window.addEventListener("resize", updateMedia);
});

onBeforeUnmount(() => {
  window.removeEventListener("resize", updateMedia);
});
</script>

<style></style>
