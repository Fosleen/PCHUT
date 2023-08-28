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

      <div>
        <Dropdown
          placeholder="Odaberi dio"
          :options="hardcodedOptions"
          class="pc-builder-first-dropdown"
        />
      </div>
      <Dropdown
        placeholder="Odaberi dio"
        :options="hardcodedOptions"
        hardcoded-value="First option"
        class="pc-builder-second-dropdown"
      />
      <Dropdown
        placeholder="Odaberi dio"
        :options="hardcodedOptions"
        hardcoded-value="First option"
        class="pc-builder-third-dropdown"
      />
      <Dropdown
        placeholder="Odaberi dio"
        :options="hardcodedOptions"
        hardcoded-value="First option"
        class="pc-builder-fourth-drodpown"
      />
      <Dropdown
        placeholder="Odaberi dio"
        :options="hardcodedOptions"
        hardcoded-value="First option"
        class="pc-builder-fifth-background"
      />
      <Dropdown
        placeholder="Odaberi dio"
        :options="hardcodedOptions"
        hardcoded-value="First option"
        class="pc-builder-sixth-background"
      />
      <Dropdown
        placeholder="Odaberi dio"
        :options="hardcodedOptions"
        hardcoded-value="First option"
        class="pc-builder-seventh-background"
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
import Dropdown from "../components/Dropdown.vue";
import FinalPriceAndButton from "../components/FinalPriceAndButton.vue";

const hardcodedOptions = [
  { id: 1, name: "Option 1" },
  { id: 2, name: "Option 2" },
  { id: 3, name: "Option 3" },
];
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

  select {
    position: absolute;
    width: 25%;
    z-index: 1000;
  }
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

.pc-builder-first-dropdown {
  left: 50px;
  top: 150px;
}

.pc-builder-second-dropdown {
  left: 50px;
}

.pc-builder-third-dropdown {
  left: 50px;
  bottom: 200px;
}

.pc-builder-fourth-drodpown {
  top: 100px;
}

.pc-builder-fifth-background {
  bottom: 100px;
}

.pc-builder-sixth-background {
  top: 300px;
  right: 100px;
}

.pc-builder-seventh-background {
  bottom: 160px;
  right: 100px;
}
</style>
