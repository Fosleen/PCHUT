<template>
  <input
    :type="props.type"
    :placeholder="props.placeholder"
    required
    @input="$emit('update:inputValue', $event.target.value)"
  />
</template>

<script setup>
const props = defineProps({
  placeholder: String,
  type: String,
});
</script>

<style lang="scss">
@import "../utils/theme.scss";

input {
  font-size: 18px;
  padding: 8px 16px;
  border: 2px solid $colorPrimary;
  background-color: $colorBgPrimary;
  width: 90%;
  border-radius: 4px;
}
</style>
