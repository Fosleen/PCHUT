<template>
  <div>
    <HomepageSubmenu/>
    <Hero />

    <div class="homepage-component-outer-wrapper">
      <h1 class="homepage-component-wrapper-title">Grafičke kartice</h1>
      <div class="item-type-wrapper">
        <PCPartCard
          v-for="(gpu, index) in gpus"
          :key="index"
          :component="gpu"
        />
        <!--if i pass props that dont exist, nothing will render!!-->
      </div>

      <div class="pagination-button-wrapper">
        <Button
          shape="trapezoid pink"
          text="UČITAJ VIŠE"
          @click="loadMoreGPU"
        />
      </div>

      <h1 class="homepage-component-wrapper-title">Procesori</h1>

      <div class="item-type-wrapper">
        <PCPartCard
          v-for="(cpu, index) in cpus"
          :key="index"
          :component="cpu"
        />
      </div>

      <div class="pagination-button-wrapper">
        <Button
          shape="trapezoid pink"
          text="UČITAJ VIŠE"
          @click="loadMoreCPU"
        />
      </div>

      <h1 class="homepage-component-wrapper-title">Matične ploče</h1>

      <div class="item-type-wrapper">
        <PCPartCard
          v-for="(motherboard, index) in mbs"
          :key="index"
          :component="motherboard"
        />
      </div>

      <div class="pagination-button-wrapper">
        <Button
          shape="trapezoid pink"
          text="UČITAJ VIŠE"
          @click="loadMoreMotherboards"
        />
      </div>

      <h1 class="homepage-component-wrapper-title">RAM memorije</h1>

      <div class="item-type-wrapper">
        <PCPartCard
          v-for="(motherboard, index) in rams"
          :key="index"
          :component="motherboard"
        />
      </div>

      <div class="pagination-button-wrapper">
        <Button
          shape="trapezoid pink"
          text="UČITAJ VIŠE"
          @click="loadMoreRAMs"
        />
      </div>
    </div>

    <PcBuilderHomepage />

    <DiscountProducts />
  </div>
</template>

<script setup>
import Hero from "../components/Hero.vue";
import PCPartCard from "../components/PCPartCard.vue";
import PcBuilderHomepage from "../components/PcBuilderHomepage.vue";
import { ref, onMounted } from "vue";
import Button from "../components/Button.vue";

import {
  getAllGraphicCardsPaginated,
  getAllCPUsPaginated,
  getAllMotherboardsPaginated,
  getAllRAMsPaginated,
} from "../api/api";
import DiscountProducts from "../components/DiscountProducts.vue";
import HomepageSubmenu from "../components/HomepageSubmenu.vue";

const gpuCurrentPage = ref(1);
const cpuCurrentPage = ref(1);
const motherboardCurrentPage = ref(1);
const ramsCurrentPage = ref(1);

const gpus = ref([]);

const cpus = ref([]);

const mbs = ref([]);

const rams = ref([]);

const fetchGpuData = async (page) => {
  const response = await getAllGraphicCardsPaginated(page);
  gpus.value = [...gpus.value, ...response.gpus]; //to append items that were loaded before
};

const fetchCpuData = async (page) => {
  const response = await getAllCPUsPaginated(page);
  cpus.value = [...cpus.value, ...response.cpus];
};

const fetchMotherboardsData = async (page) => {
  const response = await getAllMotherboardsPaginated(page);
  mbs.value = [...mbs.value, ...response.motherboards];
};

const fetchRAMsData = async (page) => {
  const response = await getAllRAMsPaginated(page);
  rams.value = [...rams.value, ...response.rams];
};

const loadMoreGPU = () => {
  gpuCurrentPage.value++;
  fetchGpuData(gpuCurrentPage.value); // Fetch data for the next page
};

const loadMoreCPU = () => {
  cpuCurrentPage.value++;
  fetchCpuData(cpuCurrentPage.value);
};

const loadMoreMotherboards = () => {
  motherboardCurrentPage.value++;
  fetchMotherboardsData(motherboardCurrentPage.value);
};

const loadMoreRAMs = () => {
  ramsCurrentPage.value++;
  fetchRAMsData(ramsCurrentPage.value);
};

onMounted(async () => {
  await fetchGpuData(gpuCurrentPage.value);
  await fetchCpuData(cpuCurrentPage.value);
  await fetchMotherboardsData(motherboardCurrentPage.value);
  await fetchRAMsData(ramsCurrentPage.value);
});
</script>

<style lang="scss" scoped>
@import "../utils/theme.scss";

.homepage-component-outer-wrapper {
  max-width: 1200px;
  margin: 0 auto;

  .homepage-component-wrapper-title {
    color: $pink;
    padding: 12px 12px 0;
  }

  .item-type-wrapper {
    padding: 12px;
    gap: 20px;
    justify-content: center;
    align-items: center;
    margin-bottom: 24px;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
  }
  .pagination-button-wrapper {
    display: flex;
    justify-content: center;

    &:last-of-type {
      margin-bottom: 20px;
    }
  }
}

@media screen and ($tablet) {
  .homepage-component-outer-wrapper {
    .item-type-wrapper {
      justify-content: center;
    }
  }
}

@media screen and ($tabletLarge) {
  .homepage-component-outer-wrapper {
    .item-type-wrapper {
      grid-template-columns: repeat(4, 1fr);
    }
  }
}
</style>
