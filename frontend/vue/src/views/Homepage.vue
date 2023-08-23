<template>
  <div>
    <Hero />

    <div class="gpus-wrapper">
      <PCPartCard v-for="(gpu, index) in gpus" :key="index" :gpu="gpu" />
      <!--if i pass props that dont exist, nothing will render!!-->
    </div>
  </div>
</template>

<script setup>
import Hero from "../components/Hero.vue";
import PCPartCard from "../components/PCPartCard.vue";
import { ref, onMounted } from "vue";

import { getAllGraphicCards } from "../api/api";
const gpus = ref([]);

onMounted(async () => {
  const response = await getAllGraphicCards();
  gpus.value = response.gpus;
  console.log("Gpus", gpus.value);
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
