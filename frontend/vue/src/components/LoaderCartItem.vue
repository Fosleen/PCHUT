<template setup>
  <div>
    <content-loader
      viewBox="0 0 500 100"
      :speed="2"
      primaryColor="#e6e6e6"
      secondaryColor="#e0d7df"
    >
      <rect x="8" y="40" rx="0" ry="0" width="16" height="16" />
      <rect x="34" y="12" rx="0" ry="0" width="74" height="74" />
      <rect x="120" y="40" rx="0" ry="0" width="114" height="16" />
      <rect x="304" y="36" rx="0" ry="0" width="75" height="26" />
      <rect x="450" y="42" rx="0" ry="0" width="36" height="20" />
    </content-loader>
  </div>
</template>

<script setup>
import { ContentLoader } from "vue-content-loader";
</script>
