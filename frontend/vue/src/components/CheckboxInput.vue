<template>
  <div class="checkbox-input-container">
    <input
      type="checkbox"
      :value="props.value"
      :name="props.name"
      :id="props.id"
      :disabled="props.disabled"
      :checked="props.checked"
      @click="$emit('checkbox-click')"
    />
    <label :for="props.id">{{ props.value }}</label>
  </div>
</template>

<script setup>
const props = defineProps({
  value: String,
  name: String,
  checked: Boolean || false,
  id: String,
  disabled: Boolean,
});
</script>

<style lang="scss">
@import "../utils/theme.scss";

.checkbox-input-container {
  display: flex;
  color: $colorTextSecondary;
  justify-content: start;
  align-items: center;
  gap: 8px;

  input {
    accent-color: #68e199;
    background-color: gray;
    height: 20px;
    width: 20px;
  }

  label {
    font-size: 20px;
    font-weight: 300;
  }
}
</style>
