<template>
  <div>
    <Hero />

    <div class="gpus-wrapper">
      <PCPartCard v-for="(gpu, index) in gpus" :key="index" :component="gpu" />
      <!--if i pass props that dont exist, nothing will render!!-->
    </div>

    <div class="gpus-wrapper">
      <PCPartCard v-for="(cpu, index) in cpus" :key="index" :component="cpu" />
      <!--if i pass props that dont exist, nothing will render!!-->
    </div>
  </div>
</template>

<script setup>
import Hero from "../components/Hero.vue";
import PCPartCard from "../components/PCPartCard.vue";
import { ref, onMounted } from "vue";

import { getAllGraphicCards, getAllCPUs } from "../api/api";
const gpus = ref([]);

const cpus = ref([]);

onMounted(async () => {
  const graphicCards = await getAllGraphicCards();
  gpus.value = graphicCards.gpus;
  console.log("Gpus", gpus.value);

  const procesors = await getAllCPUs();
  cpus.value = procesors.cpus;
  console.log("Cpus", cpus.value);
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
