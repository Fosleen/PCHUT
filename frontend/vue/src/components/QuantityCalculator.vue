<template>
  <div class="quantity-calc-grid">
    <div
      class="quantity-calc-item"
      @click="$emit('changeQuantity', quantity > 0 ? quantity - 1 : 0)"
    >
      -
    </div>
    <div class="quantity-calc-item">{{ quantity }}</div>
    <div
      class="quantity-calc-item"
      @click="$emit('changeQuantity', quantity + 1)"
    >
      +
    </div>
  </div>
</template>

<script setup>
const props = defineProps({
  quantity: Number,
});
</script>

<style lang="scss">
@import "../utils/theme.scss";

.quantity-calc-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  width: fit-content;
  font-weight: 600;
  margin: 12px 0;

  .quantity-calc-item {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 36px;
    width: 36px;
    font-family: $fontTertirary;
    font-size: 20px;

    &:first-child {
      background-color: $colorTextSecondary;
      cursor: pointer;
    }

    &:nth-child(2) {
      border: 1px solid $colorSecondary;
    }

    &:last-child {
      background-color: $colorSecondary;
      color: $colorTextSecondary;
      cursor: pointer;
    }
  }
}

@media screen and ($desktop) {
  .quantity-calc-grid {
    font-size: 32px;
    
    .quantity-calc-item {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 60px;
      width: 60px;
      font-family: $fontTertirary;
      font-size: 20px;
    }
  }
}
</style>
