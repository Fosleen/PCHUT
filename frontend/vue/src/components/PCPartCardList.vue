<template>
  <div class="pc-part-card-text-group-item-wrapper">
    <h4 class="pc-part-card-text-group-name">
      {{ textGroupName }}
    </h4>
    <ul class="pc-part-card-ul">
      <li
        v-for="(item, index) in textGroupItems"
        :key="index"
        class="pc-part-card-list-item"
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

.pc-part-card-ul {
  color: $grey-dark;
  padding-left: 24px;
}

.pc-part-card-text-group-name {
  margin-bottom: 10px;
  font-size: 20px;
  color: $grey-dark;
}

.pc-part-card-list-item {
  margin-bottom: 12px;
  font-size: 16px;
}
</style>
