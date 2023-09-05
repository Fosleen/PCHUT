<template>
  <h1 class="homepage-component-wrapper-title">Proizvodi trenutno na akciji</h1>

  <div class="item-type-wrapper">
    <DiscountPartCard
      v-for="(part, index) in productsWithDiscount"
      :key="index"
      :component="part"
    />
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { getAllProductsOnDiscount } from "../api/api";
import DiscountPartCard from "./DiscountPartCard.vue";

const productsWithDiscount = ref([]);

onMounted(async () => {
  const discountProducts = await getAllProductsOnDiscount();
  productsWithDiscount.value = discountProducts.data;
  console.log("Discount products", productsWithDiscount.value);
});
</script>

<style lang="scss" scoped>
@import "../utils/theme.scss";
.item-type-wrapper {
  display: flex;
  flex-direction: column;
  padding: 12px;
  gap: 20px;
  justify-content: center;
  align-items: center;

  @media screen and ($tabletLarge) {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    justify-items: center;
    justify-content: center;
  }

  @media screen and ($desktopLarge) {
    grid-template-columns: repeat(4, 1fr);
  }
}
</style>
