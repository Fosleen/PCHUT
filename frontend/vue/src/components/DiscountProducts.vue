<template>
  <div>
    <h1 class="homepage-component-wrapper-title">
      Proizvodi trenutno na akciji
    </h1>

    <div class="item-type-wrapper">
      <DiscountPardCard
        v-for="(part, index) in productsWithDiscount"
        :key="index"
        :component="part"
      />

      <!--make pc part card with discount component-->
    </div>
  </div>
</template>

<script setup>
import PCPartCard from "./PCPartCard.vue";
import { ref, onMounted } from "vue";
import { getAllProductsOnDiscount } from "../api/api";
import DiscountPardCard from "./DiscountPartCard.vue";

const productsWithDiscount = ref([]);

onMounted(async () => {
  const discountProducts = await getAllProductsOnDiscount();
  productsWithDiscount.value = discountProducts.components;
  console.log("Discount products", productsWithDiscount.value);
});
</script>

<style lang="scss" scoped></style>
