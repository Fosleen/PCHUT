<template>
  <input
    class="form-control"
    :type="props.type"
    :placeholder="props.placeholder"
    :disabled="props.disabled"
    :value="inputValue"
    required
    :class="[props.disabled ? 'color-disabled' : 'color-primary']"
    @input="$emit('update:inputValue', $event.target.value)"
  />
</template>

<script setup>
const props = defineProps({
  placeholder: String,
  inputValue: String,
  type: String,
  disabled: Boolean || false,
});
</script>

<style lang="scss">
@import "../utils/theme.scss";

input {
  font-size: 18px;
  padding: 8px 16px;
  background-color: $colorBgPrimary;
  width: 100%;
  border-radius: 4px;
}

.color-disabled {
  border: 2px solid $white-dark;
  background-color: $white-dark;
}

.color-primary {
  border: 2px solid $colorPrimary;
  background-color: $colorBgPrimary;
}
</style>
