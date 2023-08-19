<template>
  <div class="trapezoid">
    <button :form="form" :type="props.type">{{ props.text }}</button>
  </div>
</template>

<script setup>
const props = defineProps({
  text: String,
  type: String,
  form: String || null,
});
</script>

<style lang="scss">
@import "../utils/theme.scss";
button {
  width: 220px;
  height: 50px;
  font-size: 20px;
  background-color: $colorPrimary;
  text-transform: uppercase;
  color: $colorTextSecondary;
  font-weight: 500;
  transition: 0.2s;
  cursor: pointer;

  &:hover {
    background-color: $colorSecondary;
  }
}

.trapezoid {
  width: 220px;
  clip-path: polygon(0 0, 100% 0, 84% 100%, 16% 100%);
}
</style>
