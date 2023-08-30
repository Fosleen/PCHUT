<template>
  <div>
    <Hero />

    <h1 style="color: red">Grafičke</h1>
    <div class="gpus-wrapper">
      <PCPartCard v-for="(gpu, index) in gpus" :key="index" :component="gpu" />
      <!--if i pass props that dont exist, nothing will render!!-->
    </div>

    <h1 style="color: red">Procesori</h1>

    <div class="gpus-wrapper">
      <PCPartCard v-for="(cpu, index) in cpus" :key="index" :component="cpu" />
      <!--if i pass props that dont exist, nothing will render!!-->
    </div>

    <h1 style="color: red">Matične ploče</h1>

    <div class="gpus-wrapper">
      <PCPartCard
        v-for="(motherboard, index) in mbs"
        :key="index"
        :component="motherboard"
      />
      <!--if i pass props that dont exist, nothing will render!!-->
    </div>
  </div>
</template>

<script setup>
import Hero from "../components/Hero.vue";
import PCPartCard from "../components/PCPartCard.vue";
import { ref, onMounted } from "vue";

import { getAllGraphicCards, getAllCPUs, getAllMotherboards } from "../api/api";
const gpus = ref([]);

const cpus = ref([]);

const mbs = ref([]);

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
});
</script>

<style lang="scss" scoped>
.gpus-wrapper {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  justify-items: center;
  justify-content: center;
  gap: 20px;
  padding: 12px;
}
</style>
