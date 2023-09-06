<template>
  <div class="pc-builder-homepage-wrapper">
    <div class="pc-builder-text-button-wrapper">
      <h3>Sastavi PC iz snova</h3>
      <BuildPCButton />
    </div>

    <div
      class="pc-builder-homepage-components-wrapper"
      v-if="gpu && cpu && mbd"
    >
      <PcBuilderComponentCard
        class="pc-builder-component-small-card-wrapper"
        :component="gpu"
        v-if="gpu && gpu.images"
        :Image="gpu?.images[0]"
      />
      <h2>+</h2>
      <PcBuilderComponentCard
        class="pc-builder-component-small-card-wrapper"
        :component="cpu"
        v-if="cpu && cpu.images"
        :Image="cpu?.images[0]"
      />
      +
      <h2>+</h2>
      <PcBuilderComponentCard
        class="pc-builder-component-small-card-wrapper"
        :component="mbd"
        v-if="mbd && mbd.images"
        :Image="mbd?.images[0]"
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
    console.log("Motherboard", mbd.value);
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
  margin-bottom: 48px;

  h3 {
    color: white;
    text-transform: uppercase;
    font-size: 32px;
  }

  .pc-builder-text-button-wrapper {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 24px;
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
