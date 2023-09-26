<template>
  <div>
    <content-loader
      viewBox="0 0 400 160"
      :speed="2"
      primaryColor="#e6e6e6"
      secondaryColor="#e0d7df"
      v-if="isTabletLarge"
    >
      <!-- <rect x="4" y="4" rx="2" ry="2" width="93" height="148" />
      <rect x="104" y="4" rx="2" ry="2" width="93" height="148" />
      <rect x="203" y="4" rx="2" ry="2" width="93" height="148" />
      <rect x="303" y="4" rx="2" ry="2" width="93" height="148" /> -->
      <rect x="4" y="4" rx="0" ry="0" width="93" height="65" />
      <rect x="8" y="74" rx="0" ry="0" width="58" height="20" />
      <circle cx="16" cy="103" r="2" />
      <rect x="24" y="100" rx="0" ry="0" width="52" height="6" />
      <circle cx="16" cy="111" r="2" />
      <rect x="24" y="108" rx="0" ry="0" width="52" height="6" />
      <rect x="8" y="120" rx="0" ry="0" width="32" height="8" />
      <rect x="8" y="130" rx="0" ry="0" width="44" height="12" />
      <rect x="18" y="146" rx="0" ry="0" width="72" height="16" />

      <rect x="104" y="4" rx="0" ry="0" width="93" height="65" />
      <rect x="108" y="74" rx="0" ry="0" width="58" height="20" />
      <circle cx="116" cy="103" r="2" />
      <rect x="124" y="100" rx="0" ry="0" width="52" height="6" />
      <circle cx="116" cy="111" r="2" />
      <rect x="124" y="108" rx="0" ry="0" width="52" height="6" />
      <rect x="108" y="120" rx="0" ry="0" width="32" height="8" />
      <rect x="108" y="130" rx="0" ry="0" width="44" height="12" />
      <rect x="118" y="146" rx="0" ry="0" width="72" height="16" />
      
      <rect x="204" y="4" rx="0" ry="0" width="93" height="65" />
      <rect x="208" y="74" rx="0" ry="0" width="58" height="20" />
      <circle cx="216" cy="103" r="2" />
      <rect x="224" y="100" rx="0" ry="0" width="52" height="6" />
      <circle cx="216" cy="111" r="2" />
      <rect x="224" y="108" rx="0" ry="0" width="52" height="6" />
      <rect x="208" y="120" rx="0" ry="0" width="32" height="8" />
      <rect x="208" y="130" rx="0" ry="0" width="44" height="12" />
      <rect x="218" y="146" rx="0" ry="0" width="72" height="16" />

      <rect x="304" y="4" rx="0" ry="0" width="93" height="65" />
      <rect x="308" y="74" rx="0" ry="0" width="58" height="20" />
      <circle cx="316" cy="103" r="2" />
      <rect x="324" y="100" rx="0" ry="0" width="52" height="6" />
      <circle cx="316" cy="111" r="2" />
      <rect x="324" y="108" rx="0" ry="0" width="52" height="6" />
      <rect x="308" y="120" rx="0" ry="0" width="32" height="8" />
      <rect x="308" y="130" rx="0" ry="0" width="44" height="12" />
      <rect x="318" y="146" rx="0" ry="0" width="72" height="16" />
    </content-loader>
    <content-loader
      viewBox="0 0 202 500"
      :speed="2"
      primaryColor="#e6e6e6"
      secondaryColor="#e0d7df"
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
