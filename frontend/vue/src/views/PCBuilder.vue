<template>
  <div class="pc-builder-parent-wrapper">
    <div class="pc-builder-wrapper">
      <img
        src="../assets/pc_build_image.png"
        class="pc-builder-custom-pc-image"
      />

      <img
        src="../assets/maticna.png"
        alt=""
        class="pc-builder-custom-motherboard-image"
      />

      <img
        src="../assets/gaming.png"
        alt=""
        class="pc-builder-background-image pc-builder-gamepad-image"
      />

      <img
        src="../assets/cpu.png"
        alt=""
        class="pc-builder-background-image pc-builder-cpu-image"
      />

      <img
        src="../assets/gaming2.png"
        alt=""
        class="pc-builder-background-image pc-builder-gaming2-image"
      />

      <img
        src="../assets/graphics-card.png"
        alt=""
        class="pc-builder-background-image pc-builder-gpu-image"
      />
    </div>
  </div>

  <FinalPriceAndButton
    price="734.5"
    price-label="some label"
    button-text="Kupi"
  />
</template>

<script setup>
import FinalPriceAndButton from "../components/FinalPriceAndButton.vue";
</script>

<style lang="scss">
.pc-builder-parent-wrapper {
  display: flex;
  justify-content: center;
  padding-top: 48px;
}
.pc-builder-wrapper {
  background-color: #eee3ff;
  width: 90%;
  display: flex;
  justify-content: center;
  align-items: center;
  position: relative;
  padding-top: 120px;
  padding-bottom: 120px;
  border-radius: 8px;
}

.pc-builder-custom-pc-image {
  height: 80%;
  z-index: 400;
}

.pc-builder-custom-motherboard-image {
  position: absolute;
  height: 35%;
  margin-right: 140px;
  margin-bottom: 130px;
  z-index: 500;
}

.pc-builder-background-image {
  position: absolute;
  height: 35%;
}

.pc-builder-cpu-image {
  margin-left: 800px;
  margin-bottom: 400px;
  margin-right: 300px;
  transform: rotate(60deg);
  z-index: 200;
}

.pc-builder-gaming2-image {
  margin-top: 500px;
  margin-left: 600px;
  z-index: 200;
}

.pc-builder-gpu-image {
  margin-top: 500px;
  left: 50px;
  z-index: 200;
  transform: rotate(20deg);
}

.pc-builder-gamepad-image {
  margin-bottom: 150px;
  left: 150px;
  z-index: 200;
  transform: rotate(-20deg);
}
</style>
