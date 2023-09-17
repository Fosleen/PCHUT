<template>
  <button
    :form="form"
    :type="props.type"
    :shape="props.shape"
    :class="[
      props.shape === 'trapezoid' ? 'trapezoid' : props.shape,
      props.isSmall === true ? 'small' : 'large',
    ]"
  >
    <div class="button-content">
      <div class="text">{{ props.text }}</div>
      <div class="icon-wrapper" v-if="props.icon">
        <PhShoppingCart :size="28" color="#282828" weight="fill" />
      </div>
    </div>
  </button>
</template>

<script setup>
import { PhShoppingCart } from "@phosphor-icons/vue";

const props = defineProps({
  text: String,
  type: String,
  form: String || null,
  isSmall: Boolean || false,
  shape: String,
  icon: Boolean || false,
});
</script>

<style lang="scss">
@import "../utils/theme.scss";

button {
  height: 50px;
  background-color: $colorPrimary;
  color: $colorTextSecondary;
  font-weight: 500;
  transition: 0.2s;
  cursor: pointer;
  align-items: center;
  justify-content: center;
  font-weight: 600;

  &.small {
    width: 100%;
    font-size: 16px;
    height: 40px;
  }

  &.large {
    width: 220px;
    font-size: 20px;
    height: 50px;
  }

  .button-content {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 4px;
    word-spacing: 4px;
  }

  &:hover {
    background-color: $colorSecondary;
    color: $colorTextSecondary;
  }
}

.trapezoid {
  width: 220px;
  clip-path: polygon(0 0, 100% 0, 84% 100%, 16% 100%);
}

.odd-shape {
  background-color: $colorTextSecondary;
  clip-path: polygon(15% 0, 85% 0, 100% 100%, 0% 100%);
  color: #282828;
  font-weight: 700;
}

.odd-shape-reversed {
  background-color: #282828;
  clip-path: polygon(15% 0, 85% 0, 100% 100%, 0% 100%);
  color: $colorTextSecondary;
  font-weight: 700;
}

.grey {
  background-color: $white-dark;
  color: $colorTextPrimary;
}

.pink {
  background-color: $colorBtnPrimary;
  color: $white-dark;
}
</style>
