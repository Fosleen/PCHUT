<template>
  <div class="pc-builder-component-card-text-group-item-wrapper">
    <h4 class="pc-builder-component-card-text-group-name">
      {{ textGroupName }}
    </h4>
    <ul class="pc-builder-component-card-ul">
      <li
        v-for="(item, index) in textGroupItems"
        :key="index"
        class="pc-builder-component-card-list-item"
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

<style lang="scss">
@import "../utils/theme.scss";

.pc-builder-component-card-ul {
  color: $grey-light;
  padding-left: 24px;
}

.pc-builder-component-card-text-group-name {
  margin-bottom: 10px;
  font-size: 20px;
  color: $grey-light;
}

.pc-builder-component-card-list-item {
  margin-bottom: 12px;
  font-size: 16px;
}
</style>
