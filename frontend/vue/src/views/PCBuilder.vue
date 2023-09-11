<template>
  <div class="pc-builder-parent-wrapper">
    <div class="pc-builder-wrapper">
      <div class="pc-builder-pc-wrapper">
        <img
          src="../assets/pc_build_image.png"
          class="pc-builder-custom-pc-image"
        />

        <img
          src="../assets/maticna.png"
          alt=""
          class="pc-builder-custom-motherboard-image"
        />
      </div>

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

      <div class="pc-builder-dropdowns-wrapper">
        <Dropdown
          placeholder="Odaberi procesor"
          :hardcodedValue="selectedOption"
          :options="cpus"
          class="pc-builder-first-dropdown"
          :disabled="!motherboardOption"
          v-model="cpuOption"
        />

        <Dropdown
          placeholder="Odaberi grafičku karticu"
          :options="gpus"
          hardcoded-value="First option"
          class="pc-builder-second-dropdown"
          v-model="gpuOption"
        />
        <Dropdown
          placeholder="Odaberi memoriju (pohranu)"
          :options="storages"
          hardcoded-value="First option"
          class="pc-builder-third-dropdown"
          v-model="storageOption"
        />
        <Dropdown
          placeholder="Odaberi RAM memoriju"
          :options="rams"
          hardcoded-value="First option"
          class="pc-builder-fourth-drodpown"
          :disabled="!motherboardOption"
          v-model="ramOption"
        />
        <Dropdown
          placeholder="Odaberi napajanje"
          :options="psus"
          hardcoded-value="First option"
          class="pc-builder-fifth-background"
          v-model="psuOption"
        />
        <Dropdown
          placeholder="Odaberi matičnu ploču"
          :options="motherboards"
          hardcoded-value="First option"
          class="pc-builder-sixth-background"
          v-model="motherboardOption"
        />
        <Dropdown
          placeholder="Odaberi kućište"
          :options="cases"
          hardcoded-value="First option"
          class="pc-builder-seventh-background"
          v-model="caseOption"
        />
      </div>
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
  getAllPSUs,
  getAllCases,
} from "../api/api";

const addToCart = (id) => {
  const existingItems = sessionStorage.getItem("cart");
  let cartItems = [];

  if (existingItems) {
    cartItems = JSON.parse(existingItems);
  }

  const product = { id: id, quantity: 1 };
  cartItems.push(product);

  console.log(cartItems);

  sessionStorage.setItem("cart", JSON.stringify(cartItems));
};

const motherboardOption = ref(null);
const cpuOption = ref(null);
const gpuOption = ref(null);
const psuOption = ref(null);
const ramOption = ref(null);
const caseOption = ref(null);
const storageOption = ref(null);

const gpus = ref([]);
const cpus = ref([]);
const motherboards = ref([]);

const rams = ref([]);

const storages = ref([]);

const psus = ref([]);

const cases = ref([]);

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
  storages.value = allStorages.storages;
  console.log("Storages", storages.value);

  const allPsus = await getAllPSUs();
  psus.value = allPsus.psus;
  console.log("Psus", psus.value);

  const allCases = await getAllCases();
  cases.value = allCases.pccases;
  console.log("Pc cases", cases.value);
});
</script>

<style lang="scss">
@import "../utils/theme.scss";
.pc-builder-parent-wrapper {
  display: flex;
  justify-content: center;
  padding-top: 48px;
  padding-bottom: -20px;

  @media screen and ($tabletLarge) {
    padding-bottom: 40px;
  }

  .pc-builder-gpu-image,
  .pc-builder-cpu-image,
  .pc-builder-gamepad-image,
  .pc-builder-gaming2-image {
    visibility: hidden;
  }

  @media screen and ($desktop) {
    .pc-builder-gpu-image,
    .pc-builder-cpu-image,
    .pc-builder-gamepad-image,
    .pc-builder-gaming2-image {
      visibility: visible;
    }
  }
}
.pc-builder-wrapper {
  background-color: #eee3ff;
  width: 90%;
  display: flex;
  justify-content: center;
  position: relative;
  padding-bottom: 60px;
  border-radius: 8px;
  flex-direction: column;

  @media screen and ($tabletLarge) {
    align-items: center;
    padding-top: 120px;
    padding-bottom: 150px;
  }

  select {
    z-index: 1000;

    @media screen and ($tabletLarge) {
      position: absolute;
      width: fit-content;
    }
  }
}

.pc-builder-custom-pc-image {
  height: 80%;
  z-index: 400;
  width: 350px;

  @media screen and ($tabletLarge) {
    height: 400px;
    width: 400px;
  }
}

.pc-builder-custom-motherboard-image {
  position: absolute;
  height: 15%;
  //margin-right: 140px;
  margin-right: 130px;
  margin-top: 25px;
  //margin-bottom: 130px;
  z-index: 500;

  @media screen and ($tabletLarge) {
    height: 25%;
  }
}

.pc-builder-background-image {
  position: absolute;
  height: 35%;
}

.pc-builder-cpu-image {
  margin-left: 800px;
  margin-bottom: 350px;
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

  @media screen and ($tabletLarge) {
    top: 45%;
  }
}

.pc-builder-third-dropdown {
  left: 50px;
  bottom: 200px;
}

.pc-builder-fourth-drodpown {
  top: 100px;

  @media screen and ($tabletLarge) {
    top: 80px;
  }
}

.pc-builder-fifth-background {
  bottom: 100px;

  @media screen and ($tabletLarge) {
    bottom: 60px;
  }
}

.pc-builder-sixth-background {
  top: 300px;
  right: 100px;

  @media screen and ($tabletLarge) {
    top: 230px;
  }
}

.pc-builder-seventh-background {
  bottom: 160px;
  right: 100px;
}

.pc-builder-dropdowns-wrapper {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.pc-builder-pc-wrapper {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding-top: 40px;
}
</style>
