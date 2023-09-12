<template>
  <div class="final-price-button-parent-wrapper">
    <!-- <div class="final-price-wrapper">
      <h5>{{ props.priceLabel }}</h5>
      <h3>Kvrc €</h3>
    </div> -->

    <div class="final-price-button-wrapper">
      <Button shape="trapezoid" :text="props.buttonText" />
    </div>
  </div>
</template>

<script setup>
import Button from "../components/Button.vue";
import { defineProps } from "vue";

const props = defineProps({
  priceLabel: String,
  buttonText: String,
});
</script>

<style lang="scss" scoped>
@import "../utils/theme.scss";
.final-price-button-parent-wrapper {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.final-price-wrapper {
  display: flex;
  align-items: center;
  gap: 60px;
  background-color: $colorTextPrimary;
  border-radius: 8px;
  padding-left: 36px;
  padding-right: 36px;
  padding-top: 24px;
  padding-bottom: 24px;
  font-size: 24px;
  //width: 100%;
  justify-content: center;

  h5 {
    color: $grey-light;
  }

  h3 {
    color: white;
  }
}
</style>
