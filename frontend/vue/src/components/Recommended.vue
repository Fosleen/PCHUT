<template>
  <div class="recommended-products-wrapper">
    <h3>MOGLO BI VAS ZANIMATI</h3>
    <div class="recommended-products-container">
      <PcBuilderCard
        v-for="product in randomProducts"
        v-bind:key="product"
        class="pc-builder-component-small-card-wrapper white-bg list-item-none"
        :component="product"
        :Image="
          product.images[0]
            ? product.images[0]
            : 'https://www.mobismea.com/upload/iblock/2a0/2f5hleoupzrnz9o3b8elnbv82hxfh4ld/No%20Product%20Image%20Available.png'
        "
      />
    </div>
  </div>
</template>

<script setup>
import { onMounted, ref } from "vue";
import {
  getGraphicCardById,
  getCPUById,
  getMotherboardById,
  getStorageById,
} from "../api/api";
import PcBuilderCard from "./PcBuilderCard.vue";

const randomProducts = ref([]);

onMounted(async () => {
  const gpu = await getGraphicCardById(1);
  const motherboard = await getMotherboardById(1);
  const cpu = await getCPUById(1);
  const storage = await getStorageById(1);

  randomProducts.value.push(gpu.data);
  randomProducts.value.push(motherboard.data);
  randomProducts.value.push(cpu.data);
  randomProducts.value.push(storage.data);
});
</script>

<style lang="scss">
@import "../utils/theme.scss";
.recommended-products-wrapper {
  h3 {
    font-size: 28px;
    color: $grey-dark;
    display: flex;
    justify-content: center;
    margin-top: 16px;
  }

  .recommended-products-container {
    padding: 12px 0;
    gap: 20px;
    justify-content: center;
    align-items: center;
    margin-bottom: 24px;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
  }
}

@media screen and ($tablet) {
  .recommended-products-wrapper {
    .recommended-products-container {
      justify-content: center;
    }
  }
}

@media screen and ($tabletLarge) {
  .recommended-products-wrapper {
    max-width: 1200px;
    margin: 0 auto;

    .recommended-products-container {
      grid-template-columns: repeat(4, 1fr);
    }
  }
}

@media screen and ($desktop) {
  .recommended-products-wrapper {
    margin: 20px auto;

    h3 {
      justify-content: start;
      margin-top: 0;
      padding: 20px 8px;
    }
  }
}
</style>
