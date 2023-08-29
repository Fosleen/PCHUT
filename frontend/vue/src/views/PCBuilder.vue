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
          placeholder="Odaberi procesor"
          :hardcodedValue="selectedOption"
          :options="cpus"
          class="pc-builder-first-dropdown"
        />
      </div>
      <Dropdown
        placeholder="Odaberi grafičku karticu"
        :options="gpus"
        hardcoded-value="First option"
        class="pc-builder-second-dropdown"
      />
      <Dropdown
        placeholder="Odaberi memoriju (pohranu)"
        :options="storages"
        hardcoded-value="First option"
        class="pc-builder-third-dropdown"
      />
      <Dropdown
        placeholder="Odaberi RAM memoriju"
        :options="rams"
        hardcoded-value="First option"
        class="pc-builder-fourth-drodpown"
      />
      <Dropdown
        placeholder="Odaberi napajanje"
        :options="hardcodedOptions"
        hardcoded-value="First option"
        class="pc-builder-fifth-background"
      />
      <Dropdown
        placeholder="Odaberi matičnu ploču"
        :options="motherboards"
        hardcoded-value="First option"
        class="pc-builder-sixth-background"
      />
      <Dropdown
        placeholder="Odaberi kućište"
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
import { onMounted, ref } from "vue";
import {
  getAllGraphicCards,
  getAllCPUs,
  getAllMotherboards,
  getAllRAMs,
  getAllStorages,
} from "../api/api";

const hardcodedOptions = [
  { id: 1, name: "Option 1" },
  { id: 2, name: "Option 2" },
  { id: 3, name: "Option 3" },
];

const gpus = ref([]);
const cpus = ref([]);
const motherboards = ref([]);

const rams = ref([]);

const storages = ref([]);

onMounted(async () => {
  const graphicCards = await getAllGraphicCards();
  gpus.value = graphicCards.gpus;
  console.log("Gpus", gpus.value);

  const procesors = await getAllCPUs();
  cpus.value = procesors.cpus;
  console.log("Cpus", cpus.value);

  const allMotherboards = await getAllMotherboards();
  motherboards.value = allMotherboards.motherboards;
  console.log("Motherboards", motherboards.value);

  const allRams = await getAllRAMs();
  rams.value = allRams.rams;
  console.log("Rams", rams.value);

  const allStorages = await getAllStorages();
  storages.value = allStorages.rams;
  console.log("Storages", storages.value);
});
</script>

<style lang="scss">
.pc-builder-parent-wrapper {
  display: flex;
  justify-content: center;
  padding-top: 48px;
  padding-bottom: -20px;
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
