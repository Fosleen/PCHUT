<template setup>
  <div>
    <content-loader
      viewBox="0 0 500 100"
      :speed="2"
      primaryColor="#e6e6e6"
      secondaryColor="#e0d7df"
      v-if="isTabletLarge"
    >
      <rect x="8" y="40" rx="0" ry="0" width="16" height="16" />
      <rect x="34" y="12" rx="0" ry="0" width="74" height="74" />
      <rect x="120" y="40" rx="0" ry="0" width="114" height="16" />
      <rect x="304" y="36" rx="0" ry="0" width="75" height="26" />
      <rect x="450" y="42" rx="0" ry="0" width="36" height="20" />
    </content-loader>
    <content-loader
      viewBox="0 0 300 120"
      :speed="2"
      primaryColor="#e6e6e6"
      secondaryColor="#e0d7df"
      v-if="!isTabletLarge"
    >
      <rect x="18" y="10" rx="0" ry="0" width="116" height="116" />
      <rect x="148" y="11" rx="0" ry="0" width="144" height="36" />
      <rect x="148" y="54" rx="0" ry="0" width="118" height="36" />
      <rect x="148" y="97" rx="0" ry="0" width="90" height="26" />
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
