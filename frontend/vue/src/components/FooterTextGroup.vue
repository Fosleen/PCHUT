<template>
  <div class="footer-text-group-item-wrapper">
    <h4 class="footer-text-group-name">{{ textGroupName }}</h4>
    <ul class="footer-ul">
      <li
        v-for="(item, index) in textGroupItems"
        :key="index"
        class="footer-list-item"
      >
        {{ item }}
      </li>
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
.footer-ul {
  list-style: none;
  padding: 0;
}

.footer-text-group-name {
  text-transform: uppercase;
  margin-bottom: 10px;
  font-weight: 700;
  font-size: 20px;
}

.footer-list-item {
  margin-bottom: 12px;
  font-size: 16px;
}
</style>
