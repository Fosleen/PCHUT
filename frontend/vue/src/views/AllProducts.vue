<template>
  <div>
    <div class="homepage-component-outer-wrapper">
      <h1 class="homepage-component-wrapper-title">Grafičke kartice</h1>

      <div
        class="all-products-open-filter"
        @click="store.dispatch('toggleFilterDropdown')"
        v-if="!isFilterOpen"
      >
        FILTRIRAJ<PhSliders :size="28" />
      </div>
      <FilterDropdown v-if="isFilterOpen" />
      <div class="item-type-wrapper">
        <PCPartCard
          v-for="(gpu, index) in gpus"
          :key="index"
          :component="gpu"
        />
      </div>

      <div class="pagination-button-wrapper">
        <Button shape="trapezoid" text="Učitaj više" @click="loadMoreGPU" />
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
        <Button shape="trapezoid" text="Učitaj više" @click="loadMoreCPU" />
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
          shape="trapezoid"
          text="Učitaj više"
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
        <Button shape="trapezoid" text="Učitaj više" @click="loadMoreRAMs" />
      </div>
    </div>
  </div>
</template>

<script setup>
import PCPartCard from "../components/PCPartCard.vue";
import { ref, onMounted, computed } from "vue";
import Button from "../components/Button.vue";
import store from "../store";

import FilterDropdown from "../components/FilterDropdown.vue";
import { PhSliders } from "@phosphor-icons/vue";

import {
  getAllGraphicCardsPaginated,
  getAllCPUsPaginated,
  getAllMotherboardsPaginated,
  getAllRAMsPaginated,
} from "../api/api";

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
  cpus.value = [...cpus.value, ...response.cpus]; //to append items that were loaded before
};

const fetchMotherboardsData = async (page) => {
  const response = await getAllMotherboardsPaginated(page);
  mbs.value = [...mbs.value, ...response.motherboards]; //to append items that were loaded before
};

const fetchRAMsData = async (page) => {
  const response = await getAllRAMsPaginated(page);
  rams.value = [...rams.value, ...response.rams]; //to append items that were loaded before
};

const loadMoreGPU = () => {
  gpuCurrentPage.value++;
  fetchGpuData(gpuCurrentPage.value); // Fetch data for the next page
};

const loadMoreCPU = () => {
  cpuCurrentPage.value++;
  fetchCpuData(cpuCurrentPage.value); // Fetch data for the next page
};

const loadMoreMotherboards = () => {
  motherboardCurrentPage.value++;
  fetchMotherboardsData(motherboardCurrentPage.value); // Fetch data for the next page
};

const loadMoreRAMs = () => {
  ramsCurrentPage.value++;
  fetchRAMsData(ramsCurrentPage.value); // Fetch data for the next page
};

const isFilterOpen = computed(() => store.state.filter.isOpen);

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

.all-products-open-filter {
  background-color: $colorSecondary;
  width: fit-content;
  padding: 10px 16px;
  display: flex;
  align-items: center;
  gap: 8px;
  color: $white-dark;
  font-size: 24px;
  border-radius: 8px;
  cursor: pointer;
  margin-left: auto;
  box-shadow: 0 4px 4px rgba(0, 0, 0, 0.5);

  &:hover {
    background-color: #19013a;
    transition: 0.5s;
  }
}
</style>
