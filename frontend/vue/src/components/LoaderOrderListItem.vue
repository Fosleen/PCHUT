<template setup>
  <div>
    <content-loader
      viewBox="0 0 240 100"
      :speed="2"
      primaryColor="#e6e6e6"
      secondaryColor="#e0d7df"
    >
      <rect x="0" y="22" rx="0" ry="0" width="16" height="10" />
      <rect x="0" y="38" rx="0" ry="0" width="110" height="15" />
      <rect x="0" y="60" rx="0" ry="0" width="50" height="9" />
      <rect x="150" y="22" rx="0" ry="0" width="100" height="10" />
      <rect x="200" y="40" rx="0" ry="0" width="40" height="8" />
      <rect x="160" y="60" rx="0" ry="0" width="80" height="10" />
    </content-loader>
  </div>
</template>

<script setup>
import { ContentLoader } from "vue-content-loader";
</script>


