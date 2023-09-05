<template>
  <div>
    <Hero />

    <h1 class="homepage-component-wrapper-title">Grafičke</h1>
    <div class="item-type-wrapper">
      <PCPartCard v-for="(gpu, index) in gpus" :key="index" :component="gpu" />
      <!--if i pass props that dont exist, nothing will render!!-->
    </div>

    <h1 class="homepage-component-wrapper-title">Procesori</h1>

    <div class="item-type-wrapper">
      <PCPartCard v-for="(cpu, index) in cpus" :key="index" :component="cpu" />
    </div>

    <h1 class="homepage-component-wrapper-title">Matične ploče</h1>

    <div class="item-type-wrapper">
      <PCPartCard
        v-for="(motherboard, index) in mbs"
        :key="index"
        :component="motherboard"
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

    <PcBuilderHomepage />

    <DiscountProducts />
  </div>
</template>

<script setup>
import Hero from "../components/Hero.vue";
import PCPartCard from "../components/PCPartCard.vue";
import PcBuilderHomepage from "../components/PcBuilderHomepage.vue";
import { ref, onMounted } from "vue";

import {
  getAllGraphicCards,
  getAllCPUs,
  getAllMotherboards,
  getAllRAMs,
} from "../api/api";
import DiscountProducts from "../components/DiscountProducts.vue";
const gpus = ref([]);

const cpus = ref([]);

const mbs = ref([]);

const rams = ref([]);

onMounted(async () => {
  const graphicCards = await getAllGraphicCards();
  gpus.value = graphicCards.gpus;
  console.log("Gpus", gpus.value);

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
</style>
