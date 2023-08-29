<template>
  <select @input="$emit('input', $event.target.value)" v-bind="$attrs">
    <option :value="null" disabled selected>
      {{ placeholder }}
    </option>
    <option v-for="option in options" :key="option.id" :value="option">
      {{ option.model }}
    </option>
  </select>
</template>

<script setup>
import { defineProps } from "vue";

const props = defineProps({
  placeholder: String,
  options: Array,
  hardcodedValue: String,
});
</script>

<style lang="scss">
@import "../utils/theme.scss";

select {
  font-size: 18px;
  padding: 8px 16px;
  border: 2px solid $colorPrimary;
  background-color: $colorBgPrimary;
  width: 90%;
  border-radius: 4px;
}
</style>
