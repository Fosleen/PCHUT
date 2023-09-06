<template>
  <div>
    <Hero />

    <h1 class="homepage-component-wrapper-title">Grafičke kartice</h1>
    <div class="item-type-wrapper">
      <PCPartCard v-for="(gpu, index) in gpus" :key="index" :component="gpu" />
      <!--if i pass props that dont exist, nothing will render!!-->
    </div>

    <div class="pagination-button-wrapper">
      <Button shape="trapezoid" text="Učitaj više" @click="loadMore" />
    </div>

    <h1 class="homepage-component-wrapper-title">Procesori</h1>

    <div class="item-type-wrapper">
      <PCPartCard v-for="(cpu, index) in cpus" :key="index" :component="cpu" />
    </div>

    <div class="pagination-button-wrapper">
      <Button shape="trapezoid" text="Učitaj više" />
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
      <Button shape="trapezoid" text="Učitaj više" />
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
      <Button shape="trapezoid" text="Učitaj više" />
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
  getAllGraphicCards,
  getAllCPUs,
  getAllMotherboards,
  getAllRAMs,
  getAllGraphicCardsPaginated,
} from "../api/api";
import DiscountProducts from "../components/DiscountProducts.vue";

const currentPage = ref(1);
const gpus = ref([]);

const cpus = ref([]);

const mbs = ref([]);

const rams = ref([]);

const fetchData = async (page) => {
  const response = await getAllGraphicCardsPaginated(page);
  gpus.value = [...gpus.value, ...response.gpus];
};

const loadMore = () => {
  currentPage.value++;
  fetchData(currentPage.value); // Fetch data for the next page
};

onMounted(async () => {
  // const graphicCards = await getAllGraphicCardsPaginated(currentPage.value);
  // gpus.value = graphicCards.gpus;
  // console.log("Gpus", gpus.value);

  await fetchData(currentPage.value);

  const procesors = await getAllCPUs();
  cpus.value = procesors.cpus;
  console.log("Cpus", cpus.value);

  const motherboards = await getAllMotherboards();
  mbs.value = motherboards.motherboards;
  console.log("Motherboards", mbs.value);

  const allRams = await getAllRAMs();
  rams.value = allRams.rams;
  console.log("Rams", rams.value);
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
  margin-bottom: 24px;

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

.homepage-component-wrapper-title {
  color: $pink;
  padding-left: 12px;
}

.pagination-button-wrapper {
  display: flex;
  justify-content: center;
}
</style>
