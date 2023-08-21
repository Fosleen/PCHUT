<template>
  <button
    :form="form"
    :type="props.type"
    :shape="props.shape"
    :class="[props.shape === 'trapezoid' ? 'trapezoid' : 'odd-shape']"
  >
    {{ props.text }}
  </button>
</template>

<script setup>
const props = defineProps({
  text: String,
  type: String,
  form: String || null,
  shape: String,
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

.odd-shape {
  background-color: #d9d9d9;
  clip-path: polygon(15% 0, 85% 0, 100% 100%, 0% 100%);
  color: #282828;
  font-weight: 700;
}
</style>
