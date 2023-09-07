<template>
  <textarea
    class="form-control"
    :placeholder="props.placeholder"
    required
    @input="$emit('update:inputValue', $event.target.value)"
    cols="50"
    rows="7"
  />
</template>

<script setup>
const props = defineProps({
  placeholder: String,
});
</script>

<style lang="scss">
@import "../utils/theme.scss";

textarea {
  font-size: 18px;
  padding: 8px 16px;
  border: 2px solid $colorPrimary;
  background-color: $colorBgPrimary;
  width: 100%;
  border-radius: 4px;
}
</style>
