<template>
  <div class="pc-builder-homepage-wrapper">
    <div class="pc-builder-homepage-container">
      <div class="pc-builder-text-button-wrapper">
        <h3>SASTAVI PC IZ SNOVA</h3>
        <BuildPCButton />
      </div>

      <div
        class="pc-builder-homepage-components-wrapper"
        v-if="gpu && cpu && mbd"
      >
        <PcBuilderCard
          class="pc-builder-component-small-card-wrapper"
          :component="gpu"
          v-if="gpu && gpu.images"
          :Image="gpu?.images[0]"
        />
        <h2>+</h2>
        <PcBuilderCard
          class="pc-builder-component-small-card-wrapper"
          :component="cpu"
          v-if="cpu && cpu.images"
          :Image="cpu?.images[0]"
        />

        <h2>+</h2>
        <PcBuilderCard
          class="pc-builder-component-small-card-wrapper"
          :component="mbd"
          v-if="mbd && mbd.images"
          :Image="mbd?.images[0]"
        />
      </div>
      <div class="pc-builder-choose-container">
        <h3 class="choose">Odaberi svoje komponente</h3>
        <img src="../assets/arrow.png" alt="arrow-img" />
      </div>
    </div>
  </div>
</template>

<script setup>
import { onMounted, ref } from "vue";
import { getGraphicCardById, getCPUById, getMotherboardById } from "../api/api";
import BuildPCButton from "./BuildPCButton.vue";
import PcBuilderCard from "./PcBuilderCard.vue";

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
  margin-bottom: 48px;

  .pc-builder-homepage-container {
    max-width: 1200px;
    margin: 0 auto;

    h3 {
      color: white;
      font-size: 32px;
      letter-spacing: 1px;
      font-weight: 600;

      @media screen and ($desktop) {
        font-size: 40px;
      }
      &.choose {
        font-size: 32px;
        -webkit-text-stroke: 2px $pink;
        font-weight: 900;
      }
    }

    .pc-builder-choose-container {
      display: none;
      margin-top: 40px;
      align-items: end;
      gap: 16px;
      padding-bottom: 32px;
      margin-left: 16px;

      & img {
        padding-bottom: 6px;
      }

      @media screen and ($tablet) {
        display: flex;
      }
    }

    .pc-builder-text-button-wrapper {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      padding: 24px 0;
      position: relative;
      gap: 24px;
      margin-left: 24px;

      @media screen and ($tablet) {
        flex-direction: row;
        align-items: center;
      }
    }
  }
}

.pc-builder-homepage-components-wrapper {
  display: flex;
  gap: 8px;
  justify-content: space-around;
  justify-content: center;
  align-items: center;
  padding-bottom: 24px;
  flex-direction: column;

  @media screen and ($tablet) {
    flex-direction: row;
    gap: 0px;
    grid-template-columns: repeat(5, 1fr);
    margin: 0 16px;
  }

  @media screen and ($tabletLarge) {
    gap: 8px;
  }

  @media screen and ($desktop) {
    margin: 0;
  }

  h2 {
    font-size: 64px;
    color: white;
    font-weight: 500;
    padding-bottom: 20px;

    @media screen and ($tablet) {
      font-size: 48px;
      padding-bottom: 0px;
      display: flex;
      justify-content: center;
    }

    @media screen and ($tabletLarge) {
      font-size: 64px;
    }
  }
}
</style>
