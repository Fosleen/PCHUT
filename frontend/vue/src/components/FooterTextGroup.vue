<template>
  <div class="footer-text-group-item-wrapper">
    <h4 class="footer-text-group-name">{{ textGroupName }}</h4>
    <ul class="some-ul">
      <li v-for="(item, index) in textGroupItems" :key="index">{{ item }}</li>
    </ul>
  </div>
</template>

<script setup>
import { defineProps } from "vue";

const props = defineProps({
  textGroupName: String,
  textGroupItems: Array,
});
</script>

<style>
.footer-text-group-item-wrapper {
  /* width: 100%; */
}

.some-ul {
  list-style: none;
  padding: 0;
}

.footer-text-group-name {
  text-transform: uppercase;
}
</style>
