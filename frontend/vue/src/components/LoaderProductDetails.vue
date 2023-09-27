<template>
  <content-loader
    viewBox="0 0 300 300"
    :speed="2"
    primaryColor="#e6e6e6"
    secondaryColor="#e0d7df"
  >
    <rect x="0" y="8" rx="0" ry="0" width="80" height="6" />
    <rect x="64" y="24" rx="0" ry="0" width="150" height="8" />
    <rect x="0" y="40" rx="0" ry="0" width="160" height="158" />
    <rect x="0" y="202" rx="0" ry="0" width="20" height="16" />
    <rect x="24" y="202" rx="0" ry="0" width="20" height="16" />
    <rect x="48" y="202" rx="0" ry="0" width="20" height="16" />
    <rect x="166" y="110" rx="0" ry="0" width="130" height="40" />
    <rect x="240" y="150" rx="0" ry="0" width="45" height="13" />
    <rect x="166" y="90" rx="0" ry="0" width="12" height="5" />
    <rect x="166" y="96" rx="0" ry="0" width="25" height="6" />
    <rect x="166" y="103" rx="0" ry="0" width="40" height="6" />
  </content-loader>
</template>

<script setup>
import { ContentLoader } from "vue-content-loader";
</script>
