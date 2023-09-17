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

      <h1 class="homepage-component-wrapper-title">Napajanja</h1>

      <div class="item-type-wrapper">
        <PCPartCard
          v-for="(psu, index) in psus"
          :key="index"
          :component="psu"
        />
      </div>

      <div class="pagination-button-wrapper">
        <Button shape="trapezoid" text="Učitaj više" @click="loadMorePSUs" />
      </div>

      <h1 class="homepage-component-wrapper-title">Pohrana</h1>

      <div class="item-type-wrapper">
        <PCPartCard
          v-for="(storage, index) in storages"
          :key="index"
          :component="storage"
        />
      </div>

      <div class="pagination-button-wrapper">
        <Button
          shape="trapezoid"
          text="Učitaj više"
          @click="loadMoreStorages"
        />
      </div>

      <h1 class="homepage-component-wrapper-title">Kućišta za pc</h1>

      <div class="item-type-wrapper">
        <PCPartCard
          v-for="(storage, index) in cases"
          :key="index"
          :component="storage"
        />
      </div>

      <div class="pagination-button-wrapper">
        <Button shape="trapezoid" text="Učitaj više" @click="loadMoreCases" />
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
  getAllPSUsPaginated,
  getAllStoragesPaginated,
  getAllPCCasesPaginated,
} from "../api/api";

//optimize this file code later

const gpuCurrentPage = ref(1);
const cpuCurrentPage = ref(1);
const motherboardCurrentPage = ref(1);
const ramsCurrentPage = ref(1);
const psusCurrentPage = ref(1);
const storagesCurrentPage = ref(1);
const pcCasesCurrentPage = ref(1);

const gpus = ref([]);

const cpus = ref([]);

const mbs = ref([]);

const rams = ref([]);

const psus = ref([]);

const storages = ref([]);

const cases = ref([]);

const fetchGpuData = async (page) => {
  const response = await getAllGraphicCardsPaginated(page);
  gpus.value = [...gpus.value, ...response.gpus];
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

const fetchPSUsData = async (page) => {
  const response = await getAllPSUsPaginated(page);
  psus.value = [...psus.value, ...response.psus];
};

const fetchStoragesData = async (page) => {
  const response = await getAllStoragesPaginated(page);
  storages.value = [...storages.value, ...response.storages];
};

const fetchCasesData = async (page) => {
  const response = await getAllPCCasesPaginated(page);
  cases.value = [...cases.value, ...response.cases];
};

const loadMoreGPU = () => {
  gpuCurrentPage.value++;
  fetchGpuData(gpuCurrentPage.value);
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

const loadMorePSUs = () => {
  psusCurrentPage.value++;
  fetchPSUsData(psusCurrentPage.value);
};

const loadMoreStorages = () => {
  storagesCurrentPage.value++;
  fetchStoragesData(storagesCurrentPage.value);
};

const loadMoreCases = () => {
  pcCasesCurrentPage.value++;
  fetchCasesData(pcCasesCurrentPage.value);
};

const isFilterOpen = computed(() => store.state.filter.isOpen);

onMounted(async () => {
  await fetchGpuData(gpuCurrentPage.value);

  await fetchCpuData(cpuCurrentPage.value);

  await fetchMotherboardsData(motherboardCurrentPage.value);

  await fetchRAMsData(ramsCurrentPage.value);

  await fetchPSUsData(psusCurrentPage.value);

  await fetchStoragesData(storagesCurrentPage.value);

  await fetchCasesData(pcCasesCurrentPage.value);
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
