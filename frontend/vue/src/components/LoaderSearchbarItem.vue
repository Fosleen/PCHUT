<template>
  <div>
    <content-loader
      viewBox="0 0 300 68"
      :speed="2"
      primaryColor="#e6e6e6"
      secondaryColor="#e0d7df"
    >
      <rect x="4" y="4" rx="0" ry="0" width="62" height="62" />
      <rect x="70" y="23" rx="0" ry="0" width="174" height="22" />
      <rect x="250" y="23" rx="0" ry="0" width="41" height="22" />
    </content-loader>
  </div>
</template>

<script setup>
import { ContentLoader } from "vue-content-loader";
</script>
