<template>
  <div class="pc-builder-homepage-wrapper">
    <div class="pc-builder-text-button-wrapper">
      <h3>Sastavi PC iz snova</h3>
      <BuildPCButton />
    </div>

    <div class="pc-builder-homepage-components-wrapper">
      <PcBuilderComponentCard
        class="pc-builder-component-small-card-wrapper"
        Image="https://cdn.mos.cms.futurecdn.net/9fdc0e6c7e4e1e175a8b986dc221e1cb.png"
        :component="gpu"
      />
      <h2>+</h2>
      <PcBuilderComponentCard
        class="pc-builder-component-small-card-wrapper"
        Image="https://cdn.mos.cms.futurecdn.net/9fdc0e6c7e4e1e175a8b986dc221e1cb.png"
        :component="cpu"
      />
      +
      <h2>+</h2>
      <PcBuilderComponentCard
        class="pc-builder-component-small-card-wrapper"
        Image="https://cdn.mos.cms.futurecdn.net/9fdc0e6c7e4e1e175a8b986dc221e1cb.png"
        :component="mbd"
      />
    </div>

    <h3>Odaberi svoje komponente</h3>
  </div>
</template>

<script setup>
import BuildPCButton from "./BuildPCButton.vue";
import PcBuilderComponentCard from "../components/PcBuilderComponentCard.vue";
import { onMounted, ref } from "vue";
import { getGraphicCardById, getCPUById, getMotherboardById } from "../api/api";

const gpu = ref([]);
const cpu = ref([]);
const mbd = ref([]);

onMounted(async () => {
  try {
    const graphicCard = await getGraphicCardById(1);
    gpu.value = graphicCard.data;
    console.log("Gpu", gpu.value);

    const procesor = await getCPUById(2);
    cpu.value = procesor.data;
    console.log("CPU", cpu.value);

    const motherboard = await getMotherboardById(2);
    mbd.value = motherboard.data;
    console.log("Motherboard", mbd.value); //tu je dobro
  } catch {
    console.log("Doslo je do errora");
  }
});
</script>

<style lang="scss" scoped>
@import "../utils/theme.scss";
.pc-builder-homepage-wrapper {
  background-image: url("../assets/custom_builder.png");
  background-position: inherit;
  background-repeat: no-repeat;
  background-size: cover;
  height: 2400px;

  h3 {
    color: white;
    text-transform: uppercase;
  }

  .pc-builder-text-button-wrapper {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px;
  }

  @media screen and ($tabletLarge) {
    height: 900px;
  }
}

.pc-builder-homepage-components-wrapper {
  display: flex;
  gap: 24px;
  justify-content: space-around;
  padding-left: 24px;
  padding-right: 24px;
  justify-content: center;
  align-items: center;
  padding-bottom: 24px;
  flex-direction: column;

  @media screen and ($tabletLarge) {
    display: flex;
    flex-direction: row;
    justify-items: center;
    justify-content: center;
  }

  h2 {
    font-size: 120px;
    color: white;
    font-weight: 200;
  }
}
</style>
