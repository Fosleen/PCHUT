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
      />
      <h2>+</h2>
      <PcBuilderComponentCard
        class="pc-builder-component-small-card-wrapper"
        Image="https://cdn.mos.cms.futurecdn.net/9fdc0e6c7e4e1e175a8b986dc221e1cb.png"
      />
      +
      <h2>+</h2>
      <PcBuilderComponentCard
        class="pc-builder-component-small-card-wrapper"
        Image="https://cdn.mos.cms.futurecdn.net/9fdc0e6c7e4e1e175a8b986dc221e1cb.png"
      />
    </div>

    <h3>Odaberi svoje komponente</h3>
  </div>
</template>

<script setup>
import BuildPCButton from "./BuildPCButton.vue";
import PcBuilderComponentCard from "../components/PcBuilderComponentCard.vue";
</script>

<style lang="scss" scoped>
@import "../utils/theme.scss";
.pc-builder-homepage-wrapper {
  background-image: url("../assets/custom_builder.png");
  background-position: inherit;
  background-repeat: no-repeat;
  background-size: cover;
  height: 900px;

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

  /* @media screen and ($tabletLarge) {
    display: flex;
    flex-direction: row;
    //grid-template-columns: repeat(2, 1fr);
    justify-items: center;
    justify-content: center;
  }

  @media screen and ($desktopLarge) {
    //grid-template-columns: repeat(3, 1fr);
  } */

  h2 {
    font-size: 120px;
    color: white;
    font-weight: 200;
  }
}
</style>
