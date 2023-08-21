<template>
  <div class="shopping-cart-item-wrapper">
    <div class="shopping-cart-item-icon">
      <PhTrash :size="32" color="white" />
    </div>
    <div class="shopping-cart-item-image-wrapper">
      <div class="shopping-cart-item-image">
        <img :src="props.item.img" :alt="props.item.title" />
      </div>
    </div>
    <div class="shopping-cart-item-info">
      <h4>
        {{ props.item.manufacturer }} {{ props.item.model }},
        {{ props.item.memory }}
      </h4>
      <QuantityCalculator :quantity="quantity" @change-quantity="change" />
      <h3>{{ props.item.price * quantity }} €</h3>
      <p>1 kom = {{ props.item.price }} €</p>
    </div>
  </div>
</template>

<script setup>
import { PhTrash } from "@phosphor-icons/vue";
import QuantityCalculator from "./QuantityCalculator.vue";
import { ref } from "vue";
const props = defineProps({
  item: Object,
});

let quantity = ref(1);

function change(newQuantity) {
  quantity.value = newQuantity;
  console.log(quantity.value);
}
</script>

<style lang="scss">
@import "../utils/theme.scss";

.shopping-cart-item-wrapper {
  width: 100%;
  background-color: $colorBgPrimary;
  display: flex;
  align-items: center;

  .shopping-cart-item-info {
    flex: 4;
    padding: 12px 0px;

    h4 {
      font-size: 16px;
      color: $colorTextPrimary;
    }

    h3 {
      font-size: 20px;
      color: $colorTextPrimary;
    }

    p {
      font-size: 12px;
      color: $colorTextTertiary;
    }
  }

  .shopping-cart-item-icon {
    display: none;
  }

  .shopping-cart-item-image-wrapper {
    background-color: $white-dark;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 130px;
    margin: 12px;
    width: 130px;

    .shopping-cart-item-image {
      display: flex;
      justify-content: center;
      align-items: center;

      img {
        padding: 0px;
        width: 100%;
        height: 100%;
        max-height: 130px;
        object-fit: cover;
      }
    }
  }
}
</style>
