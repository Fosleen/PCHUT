<template>
  <div class="filter-dropdown-wrapper">
    <div
      class="filter-dropdown-close-button"
      @click="store.dispatch('toggleFilterDropdown')"
    >
      <PhX :size="32" />
    </div>
    <div class="filter-dropdown-component-container">
      <div class="filter-dropdown-component-types-container">
        <ul class="">
          <li
            v-for="type of componentTypes"
            :key="type"
            @mouseover="displayFilter(`${type}`)"
            @click="displayFilter(`${type}`)"
          >
            <PhCpu :size="26" />{{ type }}
            <div class="icon"><PhCaretRight :size="20" /></div>
          </li>
        </ul>
      </div>

      <div class="filter-dropdown-custom-filters">
        <div
          v-if="isTypeShown('MONITORI')"
          class="filter-dropdown-custom-filter-group"
        >
          <h4>PROIZVOĐAČ:</h4>
          <CheckboxInput
            value="ACER"
            name="manufacturers"
            id="ACER"
            @checkbox-click="changeCheckboxes('ACER', 'manufacturers')"
          />
          <CheckboxInput
            value="AOC"
            name="manufacturers"
            id="AOC"
            @checkbox-click="changeCheckboxes('AOC', 'manufacturers')"
          />
          <CheckboxInput
            value="ASUS"
            name="manufacturers"
            id="ASUS"
            @checkbox-click="changeCheckboxes('ASUS', 'manufacturers')"
          />
          <CheckboxInput
            value="DELL"
            name="manufacturers"
            id="DELL"
            @checkbox-click="changeCheckboxes('DELL', 'manufacturers')"
          />
          <CheckboxInput
            value="Lenovo"
            name="manufacturers"
            id="Lenovo"
            @checkbox-click="changeCheckboxes('Lenovo', 'manufacturers')"
          />
          <CheckboxInput
            value="LG"
            name="manufacturers"
            id="LG"
            @checkbox-click="changeCheckboxes('LG', 'manufacturers')"
          />
          <CheckboxInput
            value="Philips"
            name="manufacturers"
            id="Philips"
            @checkbox-click="changeCheckboxes('Philips', 'manufacturers')"
          />
          <CheckboxInput
            value="Samsung"
            name="manufacturers"
            id="Samsung"
            @checkbox-click="changeCheckboxes('Samsung', 'manufacturers')"
          />
        </div>
        <div
          v-if="isTypeShown('LAPTOPI, PC')"
          class="filter-dropdown-custom-filter-group"
        >
          <h4>Tip:</h4>
          <CheckboxInput
            value="Laptop"
            name="type"
            id="Laptop"
            @checkbox-click="changeCheckboxes('Laptop', 'type')"
          />
          <CheckboxInput
            value="PC"
            name="type"
            id="PC"
            @checkbox-click="changeCheckboxes('PC', 'type')"
          />
        </div>
        <div
          v-if="isTypeShown('POHRANA')"
          class="filter-dropdown-custom-filter-group"
        >
          <h4>Vrsta:</h4>
          <CheckboxInput
            value="PC disk"
            name="type"
            id="PC disk"
            @checkbox-click="changeCheckboxes('PC disk', 'type')"
          />
          <CheckboxInput
            value="SSD disk"
            name="type"
            id="SSD disk"
            @checkbox-click="changeCheckboxes('SSD disk', 'type')"
          />
          <CheckboxInput
            value="Eksterni disk"
            name="type"
            id="Eksterni disk"
            @checkbox-click="changeCheckboxes('Eksterni disk', 'type')"
          />
        </div>
        <div
          v-if="isTypeShown('MONITORI')"
          class="filter-dropdown-custom-filter-group"
        >
          <h4>Tip:</h4>
          <CheckboxInput
            value="Ravan"
            name="type"
            id="Ravan"
            @checkbox-click="changeCheckboxes('Ravan', 'type')"
          />
          <CheckboxInput
            value="Zakrivljen"
            name="type"
            id="Zakrivljen"
            @checkbox-click="changeCheckboxes('Zakrivljen', 'type')"
          />
        </div>
        <div
          v-if="isTypeShown('MONITORI')"
          class="filter-dropdown-custom-filter-group"
        >
          <h4>DIJAGONALA:</h4>
          <CheckboxInput
            value="22 inča"
            name="size"
            id="22"
            @checkbox-click="changeCheckboxes('22 inča', 'size')"
          />
          <CheckboxInput
            value="24 inča"
            name="size"
            id="24"
            @checkbox-click="changeCheckboxes('24 inča', 'size')"
          />
          <CheckboxInput
            value="27 inča"
            name="size"
            id="27"
            @checkbox-click="changeCheckboxes('27 inča', 'size')"
          />
          <CheckboxInput
            value="32 inča"
            name="size"
            id="32"
            @checkbox-click="changeCheckboxes('32 inča', 'size')"
          />
        </div>
        <div
          v-if="isTypeShown('MIŠEVI')"
          class="filter-dropdown-custom-filter-group"
        >
          <h4>PROIZVOĐAČ:</h4>

          <CheckboxInput
            value="ASUS"
            name="manufacturers"
            id="ASUS"
            @checkbox-click="changeCheckboxes('ASUS', 'manufacturers')"
          />
          <CheckboxInput
            value="Logitech"
            name="manufacturers"
            id="Logitech"
            @checkbox-click="changeCheckboxes('Logitech', 'manufacturers')"
          />
          <CheckboxInput
            value="MS"
            name="manufacturers"
            id="MS"
            @checkbox-click="changeCheckboxes('MS', 'manufacturers')"
          />
          <CheckboxInput
            value="Razer"
            name="manufacturers"
            id="Razer"
            @checkbox-click="changeCheckboxes('Razer', 'manufacturers')"
          />
          <CheckboxInput
            value="Steelseries"
            name="manufacturers"
            id="Steelseries"
            @checkbox-click="changeCheckboxes('Steelseries', 'manufacturers')"
          />
          <CheckboxInput
            value="White Shark"
            name="manufacturers"
            id="White Shark"
            @checkbox-click="changeCheckboxes('White Shark', 'manufacturers')"
          />
          <CheckboxInput
            value="ASUS"
            name="manufacturers"
            id="ASUS"
            @checkbox-click="changeCheckboxes('ASUS', 'manufacturers')"
          />
        </div>

        <div
          v-if="isTypeShown('MIŠEVI')"
          class="filter-dropdown-custom-filter-group"
        >
          <h4>TIP:</h4>
          <CheckboxInput
            value="Žičan"
            name="type"
            id="Žičan"
            @checkbox-click="changeCheckboxes('Žičan', 'type')"
          />
          <CheckboxInput
            value="Bežičan"
            name="type"
            id="Bežičan"
            @checkbox-click="changeCheckboxes('Bežičan', 'type')"
          />
        </div>
        <div
          v-if="isTypeShown('HLAĐENJE')"
          class="filter-dropdown-custom-filter-group"
        >
          <h4>PROIZVOĐAČ:</h4>
          <CheckboxInput
            value="Arctic"
            name="manufacturers"
            id="Arctic"
            @checkbox-click="changeCheckboxes('Arctic', 'manufacturers')"
          />
          <CheckboxInput
            value="ASUS"
            name="manufacturers"
            id="ASUS"
            @checkbox-click="changeCheckboxes('ASUS', 'manufacturers')"
          />
          <CheckboxInput
            value="Be Quiet!"
            name="manufacturers"
            id="Be Quiet!"
            @checkbox-click="changeCheckboxes('Be Quiet!', 'manufacturers')"
          />
          <CheckboxInput
            value="Corsair"
            name="manufacturers"
            id="Corsair"
            @checkbox-click="changeCheckboxes('Corsair', 'manufacturers')"
          />
          <CheckboxInput
            value="Fractal"
            name="manufacturers"
            id="Fractal"
            @checkbox-click="changeCheckboxes('Fractal', 'manufacturers')"
          />
          <CheckboxInput
            value="Lian Li"
            name="manufacturers"
            id="Lian Li"
            @checkbox-click="changeCheckboxes('Lian Li', 'manufacturers')"
          />
          <CheckboxInput
            value="MS"
            name="manufacturers"
            id="MS"
            @checkbox-click="changeCheckboxes('MS', 'manufacturers')"
          />
          <CheckboxInput
            value="Zalman"
            name="manufacturers"
            id="Zalman"
            @checkbox-click="changeCheckboxes('Zalman', 'manufacturers')"
          />
        </div>
        <div
          v-if="isTypeShown('POHRANA')"
          class="filter-dropdown-custom-filter-group"
        >
          <h4>PROIZVOĐAČ:</h4>
          <CheckboxInput
            value="Adata"
            name="manufacturers"
            id="Adata"
            @checkbox-click="changeCheckboxes('Adata', 'manufacturers')"
          />
          <CheckboxInput
            value="ASUS"
            name="manufacturers"
            id="ASUS"
            @checkbox-click="changeCheckboxes('ASUS', 'manufacturers')"
          />
          <CheckboxInput
            value="Crucial"
            name="manufacturers"
            id="Crucial"
            @checkbox-click="changeCheckboxes('Crucial', 'manufacturers')"
          />
          <CheckboxInput
            value="Kingston"
            name="manufacturers"
            id="Kingston"
            @checkbox-click="changeCheckboxes('Kingston', 'manufacturers')"
          />
          <CheckboxInput
            value="Orico"
            name="manufacturers"
            id="Orico"
            @checkbox-click="changeCheckboxes('Orico', 'manufacturers')"
          />
          <CheckboxInput
            value="Samsung"
            name="manufacturers"
            id="Samsung"
            @checkbox-click="changeCheckboxes('Samsung', 'manufacturers')"
          />
          <CheckboxInput
            value="Seagate"
            name="manufacturers"
            id="Seagate"
            @checkbox-click="changeCheckboxes('Seagate', 'manufacturers')"
          />
          <CheckboxInput
            value="Silicon Power"
            name="manufacturers"
            id="Silicon Power"
            @checkbox-click="changeCheckboxes('Silicon Power', 'manufacturers')"
          />
          <CheckboxInput
            value="Western Digital"
            name="manufacturers"
            id="Western Digital"
            @checkbox-click="
              changeCheckboxes('Western Digital', 'manufacturers')
            "
          />
        </div>
        <div
          v-if="isTypeShown('HLAĐENJE')"
          class="filter-dropdown-custom-filter-group"
        >
          <h4>VRSTA:</h4>
          <CheckboxInput
            value="Vodeno"
            name="type"
            id="Vodeno"
            @checkbox-click="changeCheckboxes('Vodeno', 'type')"
          />
          <CheckboxInput
            value="Obično"
            name="type"
            id="Obično"
            @checkbox-click="changeCheckboxes('Obično', 'type')"
          />
        </div>
        <div
          v-if="isTypeShown('MATIČNE PLOČE')"
          class="filter-dropdown-custom-filter-group"
        >
          <h4>PROIZVOĐAČ:</h4>
          <CheckboxInput
            value="ASRock"
            name="manufacturers"
            id="ASRock"
            @checkbox-click="changeCheckboxes('ASRock', 'manufacturers')"
          />
          <CheckboxInput
            value="ASUS"
            name="manufacturers"
            id="ASUS"
            @checkbox-click="changeCheckboxes('ASUS', 'manufacturers')"
          />

          <CheckboxInput
            value="Gigabyte"
            name="manufacturers"
            id="Gigabyte"
            @checkbox-click="changeCheckboxes('Gigabyte', 'manufacturers')"
          />
          <CheckboxInput
            value="MSI"
            name="manufacturers"
            id="MSI"
            @checkbox-click="changeCheckboxes('MSI', 'manufacturers')"
          />
          <CheckboxInput
            value="NZTX"
            name="manufacturers"
            id="NZTX"
            @checkbox-click="changeCheckboxes('NZTX', 'manufacturers')"
          />
        </div>
        <div
          v-if="isTypeShown('MATIČNE PLOČE')"
          class="filter-dropdown-custom-filter-group"
        >
          <h4>PODNOŽJE:</h4>
          <CheckboxInput
            value="AMD AM4"
            name="socket_type"
            id="AMD AM4"
            @checkbox-click="changeCheckboxes('AMD AM4', 'socket_type')"
          />
          <CheckboxInput
            value="AMD AM5"
            name="socket_type"
            id="AMD AM5"
            @checkbox-click="changeCheckboxes('AMD AM5', 'socket_type')"
          />
          <CheckboxInput
            value="Intel LGA1200"
            name="socket_type"
            id="Intel LGA1200"
            @checkbox-click="changeCheckboxes('Intel LGA1200', 'socket_type')"
          />
          <CheckboxInput
            value="Intel LGA1700"
            name="socket_type"
            id="Intel LGA1700"
            @checkbox-click="changeCheckboxes('Intel LGA1700', 'socket_type')"
          />
        </div>
        <div
          v-if="isTypeShown('MATIČNE PLOČE')"
          class="filter-dropdown-custom-filter-group"
        >
          <h4>VELIČINA:</h4>
          <CheckboxInput
            value="ATX"
            name="size"
            id="ATX"
            @checkbox-click="changeCheckboxes('ATX', 'size')"
          />
          <CheckboxInput
            value="E-ATX"
            name="size"
            id="E-ATX"
            @checkbox-click="changeCheckboxes('E-ATX', 'size')"
          />
          <CheckboxInput
            value="Micro ATX"
            name="size"
            id="Micro ATX"
            @checkbox-click="changeCheckboxes('Micro ATX', 'size')"
          />
          <CheckboxInput
            value="Mini ITX"
            name="size"
            id="Mini ITX"
            @checkbox-click="changeCheckboxes('Mini ITX', 'size')"
          />
        </div>
        <div
          v-if="isTypeShown('GRAFIČKE KARTICE')"
          class="filter-dropdown-custom-filter-group"
        >
          <h4>PROIZVOĐAČ:</h4>
          <CheckboxInput
            value="AMD"
            name="type"
            id="AMD"
            @checkbox-click="changeCheckboxes('AMD', 'manufacturers')"
          />
          <CheckboxInput
            value="ASRock"
            name="type"
            id="ASRock"
            @checkbox-click="changeCheckboxes('ASRock', 'manufacturers')"
          />
          <CheckboxInput
            value="ASUS"
            name="type"
            id="ASUS"
            @checkbox-click="changeCheckboxes('ASUS', 'manufacturers')"
          />
          <CheckboxInput
            value="Gigabyte"
            name="type"
            id="Gigabyte"
            @checkbox-click="changeCheckboxes('Gigabyte', 'manufacturers')"
          />
          <CheckboxInput
            value="Inno3d"
            name="type"
            id="Inno3d"
            @checkbox-click="changeCheckboxes('Inno3d', 'manufacturers')"
          />
          <CheckboxInput
            value="KFA2"
            name="type"
            id="KFA2"
            @checkbox-click="changeCheckboxes('KFA2', 'manufacturers')"
          />
          <CheckboxInput
            value="MSI"
            name="type"
            id="MSI"
            @checkbox-click="changeCheckboxes('MSI', 'manufacturers')"
          />
          <CheckboxInput
            value="PNY"
            name="type"
            id="PNY"
            @checkbox-click="changeCheckboxes('PNY', 'manufacturers')"
          />
          <CheckboxInput
            value="Sapphire"
            name="type"
            id="Sapphire"
            @checkbox-click="changeCheckboxes('Sapphire', 'manufacturers')"
          />
        </div>

        <div
          v-if="isTypeShown('TIPKOVNICE')"
          class="filter-dropdown-custom-filter-group"
        >
          <h4>VRSTA:</h4>
          <CheckboxInput
            value="Mehanička"
            name="type"
            id="mehanicka"
            @checkbox-click="changeCheckboxes('Mehanička', 'type')"
          />
          <CheckboxInput
            value="Membranska"
            name="type"
            id="membranska"
            @checkbox-click="changeCheckboxes('membranska', 'type')"
          />
        </div>
        <div
          v-if="isTypeShown('TIPKOVNICE')"
          class="filter-dropdown-custom-filter-group"
        >
          <h4>PROIZVOĐAČ:</h4>
          <CheckboxInput
            value="ASUS"
            name="manufacturers"
            id="ASUS"
            @checkbox-click="changeCheckboxes('ASUS', 'manufacturers')"
          />
          <CheckboxInput
            value="Ducky"
            name="manufacturers"
            id="Ducky"
            @checkbox-click="changeCheckboxes('Ducky', 'manufacturers')"
          />
          <CheckboxInput
            value="Logitech"
            name="manufacturers"
            id="Logitech"
            @checkbox-click="changeCheckboxes('Logitech', 'manufacturers')"
          />
          <CheckboxInput
            value="Razer"
            name="manufacturers"
            id="Razer"
            @checkbox-click="changeCheckboxes('Razer', 'manufacturers')"
          />
          <CheckboxInput
            value="Redragon"
            name="manufacturers"
            id="Redragon"
            @checkbox-click="changeCheckboxes('Redragon', 'manufacturers')"
          />
          <CheckboxInput
            value="Steelseries"
            name="manufacturers"
            id="Steelseries"
            @checkbox-click="changeCheckboxes('Steelseries', 'manufacturers')"
          />
          <CheckboxInput
            value="Whiteshark"
            name="manufacturers"
            id="Whiteshark"
            @checkbox-click="changeCheckboxes('Whiteshark', 'manufacturers')"
          />
        </div>
        <div
          v-if="isTypeShown('TIPKOVNICE')"
          class="filter-dropdown-custom-filter-group"
        >
          <h4>SWITCHEVI:</h4>
          <CheckboxInput
            value="Crveni"
            name="switch_type"
            id="red"
            @checkbox-click="changeCheckboxes('Crveni', 'switch_type')"
          />
          <CheckboxInput
            value="Plavi"
            name="switch_type"
            id="blue"
            @checkbox-click="changeCheckboxes('Plavi', 'switch_type')"
          />
          <CheckboxInput
            value="Zeleni"
            name="switch_type"
            id="green"
            @checkbox-click="changeCheckboxes('Zeleni', 'switch_type')"
          />
          <CheckboxInput
            value="Žuti"
            name="switch_type"
            id="yellow"
            @checkbox-click="changeCheckboxes('Žuti', 'switch_type')"
          />
        </div>
        <div
          v-if="isTypeShown('TIPKOVNICE')"
          class="filter-dropdown-custom-filter-group"
        >
          <h4>SPAJANJE:</h4>
          <CheckboxInput
            value="Bežično"
            name="connector"
            id="wireless"
            @checkbox-click="changeCheckboxes('Bežično', 'connector')"
          />
          <CheckboxInput
            value="USB"
            name="connector"
            id="USB"
            @checkbox-click="changeCheckboxes('USB', 'connector')"
          />
        </div>
        <div
          v-if="isTypeShown('PROCESORI')"
          class="filter-dropdown-custom-filter-group"
        >
          <h4>BROJ JEZGRI:</h4>
          <CheckboxInput
            value="2"
            name="cores"
            id="2"
            @checkbox-click="changeCheckboxes('2', 'cores')"
          />
          <CheckboxInput
            value="4"
            name="cores"
            id="4"
            @checkbox-click="changeCheckboxes('4', 'cores')"
          />
          <CheckboxInput
            value="6"
            name="cores"
            id="6"
            @checkbox-click="changeCheckboxes('6', 'cores')"
          />
          <CheckboxInput
            value="8"
            name="cores"
            id="8"
            @checkbox-click="changeCheckboxes('8', 'cores')"
          />
          <CheckboxInput
            value="10"
            name="cores"
            id="10"
            @checkbox-click="changeCheckboxes('10', 'cores')"
          /><CheckboxInput
            value="12"
            name="cores"
            id="12"
            @checkbox-click="changeCheckboxes('12', 'cores')"
          />
          <CheckboxInput
            value="14"
            name="cores"
            id="14"
            @checkbox-click="changeCheckboxes('14', 'cores')"
          />
          <CheckboxInput
            value="16"
            name="cores"
            id="16"
            @checkbox-click="changeCheckboxes('16', 'cores')"
          />
        </div>
        <div
          v-if="isTypeShown('MIŠEVI') || isTypeShown('TIPKOVNICE')"
          class="filter-dropdown-custom-filter-group"
        >
          <h4>RGB:</h4>
          <CheckboxInput
            value="Da"
            name="rgb"
            id="RGB"
            @checkbox-click="changeCheckboxes('RGB', 'rgb')"
          />
          <CheckboxInput
            value="Ne"
            name="rgb"
            id="no rgb"
            @checkbox-click="changeCheckboxes('Bez RGB-a', 'rgb')"
          />
        </div>
        <div
          v-if="isTypeShown('PROCESORI')"
          class="filter-dropdown-custom-filter-group"
        >
          <h4>PROIZVOĐAČ:</h4>
          <CheckboxInput
            value="AMD"
            name="manufacturers"
            id="AMD"
            @checkbox-click="changeCheckboxes('AMD', 'manufacturers')"
          />
          <CheckboxInput
            value="Intel"
            name="manufacturers"
            id="Intel"
            @checkbox-click="changeCheckboxes('Intel', 'manufacturers')"
          />
        </div>
        <div
          v-if="isTypeShown('PROCESORI')"
          class="filter-dropdown-custom-filter-group"
        >
          <h4
            v-if="
              isFilterShown('Intel', 'manufacturers') ||
              isFilterShown('AMD', 'manufacturers')
            "
          >
            SERIJA:
          </h4>

          <div
            v-if="isFilterShown('AMD', 'manufacturers')"
            class="filter-dropdown-custom-filter-subgroup"
          >
            <CheckboxInput
              value="AMD Ryzen 3"
              name="series"
              id="AMD Ryzen 3"
              @checkbox-click="changeCheckboxes('AMD Ryzen 3', 'series')"
            />
            <CheckboxInput
              value="AMD Ryzen 5"
              name="series"
              id="AMD Ryzen 5"
              @checkbox-click="changeCheckboxes('AMD Ryzen 5', 'series')"
            />
            <CheckboxInput
              value="AMD Ryzen 7"
              name="series"
              id="AMD Ryzen 7"
              @checkbox-click="changeCheckboxes('AMD Ryzen 7', 'series')"
            />
            <CheckboxInput
              value="AMD Ryzen 9"
              name="series"
              id="AMD Ryzen 9"
              @checkbox-click="changeCheckboxes('AMD Ryzen 9', 'series')"
            />
          </div>
          <div
            v-if="isFilterShown('Intel', 'manufacturers')"
            class="filter-dropdown-custom-filter-subgroup"
          >
            <CheckboxInput
              value="Intel Core i3"
              name="series"
              id="intel-core-i3"
              @checkbox-click="changeCheckboxes('Intel Core i3', 'series')"
            />
            <CheckboxInput
              value="Intel Core i5"
              name="series"
              id="intel-core-i5"
              @checkbox-click="changeCheckboxes('Intel Core i5', 'series')"
            />
            <CheckboxInput
              value="Intel Core i7"
              name="series"
              id="intel-core-i7"
              @checkbox-click="changeCheckboxes('Intel Core i7', 'series')"
            />
            <CheckboxInput
              value="Intel Core i9"
              name="series"
              id="intel-core-i9"
              @checkbox-click="changeCheckboxes('Intel Core i9', 'series')"
            />
            <CheckboxInput
              value="Intel Pentium Gold"
              name="series"
              id="Intel Pentium Gold"
              @checkbox-click="changeCheckboxes('Intel Pentium Gold', 'series')"
            />
          </div>
        </div>
      </div>

      <div class="filter-dropdown-column">
        <div class="filter-dropdown-applied-filters-container">
          <div class="filter-dropdown-applied-filters-row">
            <h3>PRIMIJENJENI FILTERI:</h3>
            <PhTrash :size="32" @click="clearAppliedFilters" />
          </div>

          <div class="filter-dropdown-applied-filters-inner">
            <div
              v-if="selectedComponentType"
              class="filter-dropdown-applied-filters-item"
            >
              {{ selectedComponentType }}
            </div>
            <div v-for="item in appliedFilters" :key="item.value">
              <div
                v-if="item.value.length > 0"
                class="filter-dropdown-applied-filters-item"
              >
                {{ getArrayText(item) }}
              </div>
            </div>
          </div>
          <div class="filter-dropdown-search-button" @click="searchProducts">
            <PhMagnifyingGlass weight="bold" :size="24" />
            <h3>PRETRAŽI</h3>
          </div>
        </div>
        <div class="filter-dropdown-price-range-container">
          <div class="filter-dropdown-price-range-row">
            <h3>RASPON CIJENE:</h3>
            <div class="filter-dropdown-price-range-inputs">
              <input type="text" v-model="minRange" disabled />
              <p>€ -</p>
              <input type="text" v-model="maxRange" disabled />
              <p>€</p>
            </div>
          </div>
          <div class="filter-dropdown-price-range-slider">
            <RangeSlider @price-range-change="changePriceRange" />
          </div>
        </div>
        <div class="filter-dropdown-only-avaliable-container">
          <input id="ch" type="checkbox" />
          <h3>SAMO ODMAH DOSTUPNI:</h3>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import {
  PhX,
  PhCpu,
  PhMouse,
  PhMonitor,
  PhKeyboard,
  PhTrash,
  PhCaretRight,
  PhMagnifyingGlass,
} from "@phosphor-icons/vue";
import { ref, computed } from "vue";
import RangeSlider from "./RangeSlider.vue";
import CheckboxInput from "./CheckboxInput.vue";
import store from "../store";

const emit = defineEmits();
const isFilterOpen = computed(() => store.state.filter.isOpen);
let minRange = ref(0); // default values
let maxRange = ref(6000);

const componentTypes = [
  "LAPTOPI, PC",
  "PROCESORI",
  "GRAFIČKE KARTICE",
  "MATIČNE PLOČE",
  "HLAĐENJE",
  "POHRANA",
  "TIPKOVNICE",
  "MIŠEVI",
  "MONITORI",
];

const selectedComponentType = ref("");
let cores = ref([]);
let manufacturers = ref([]);
let series = ref([]);
let type = ref([]);
let switch_type = ref([]);
let connector = ref([]);
let size = ref([]);
let socket_type = ref([]);
let rgb = ref([]);

let appliedFilters = ref([
  cores,
  manufacturers,
  series,
  type,
  switch_type,
  connector,
  size,
  socket_type,
  rgb,
]);

function displayFilter(componentType) {
  clearArray(manufacturers);
  clearArray(cores);
  clearArray(series);
  clearArray(type);
  clearArray(switch_type);
  clearArray(connector);
  clearArray(size);
  clearArray(socket_type);
  clearArray(rgb);
  selectedComponentType.value = componentType;
}

function clearArray(name) {
  // console.log("delete " + JSON.parse(JSON.stringify(name.value)));
  name.value = [];
}

function searchProducts() {
  console.log(selectedComponentType.value);
  emit("searchProducts");
}

function getArrayText(name) {
  return JSON.parse(JSON.stringify(name.value)).toString();
}

function changePriceRange(min, max) {
  minRange.value = min;
  maxRange.value = max;
}

function changeCheckboxes(id, groupName) {
  const groupArray = this[groupName];

  const index = groupArray.indexOf(id);
  if (index !== -1) {
    groupArray.splice(index, 1);
  } else {
    groupArray.push(id);
  }

  console.log(JSON.parse(JSON.stringify(groupArray))); // removes JS proxy and leaves normal array
}

function isFilterShown(name, groupName) {
  return this[groupName].includes(name);
}

function isTypeShown(groupName) {
  return selectedComponentType.value === groupName;
}

function clearAppliedFilters() {
  appliedFilters.value.forEach((filterArray) => {
    clearArray(filterArray);
  });
  selectedComponentType.value = "";
  emit("clearFilters");
}
</script>

<style lang="scss">
@import "../utils/theme.scss";

.filter-dropdown-wrapper {
  width: 100%;
  background-color: $colorTextPrimary;
  position: relative;

  .filter-dropdown-close-button {
    position: absolute;
    right: 8px;
    top: 10px;
    width: 50px;
    height: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: $white-dark;
    color: $colorSecondary;
    border-radius: 8px;
    cursor: pointer;

    &:hover {
      background-color: $colorBtnTertiary;
      transition: 0.5s;
      color: $colorTextPrimary;
    }
  }

  .filter-dropdown-component-container {
    padding: 4px;
    display: flex;
    flex-direction: column-reverse;

    .filter-dropdown-column {
      .filter-dropdown-search-button {
        cursor: pointer;
        background-color: $colorBtnTertiary;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
        font-size: 20px;
        color: $colorTextPrimary;
        padding: 8px;
        border-radius: 8px;
        margin-top: auto;

        h3 {
          font-weight: 600;
        }
      }
    }

    .filter-dropdown-component-types-container {
      order: 1;

      ul {
        color: $colorBgPrimary;
        border: 2px solid #525252;
        border-radius: 10px;
        margin: 8px;
        display: flex;
        flex-direction: column;
        gap: 16px;
        padding: 12px;
        width: fit-content;

        li {
          font-size: 24px;
          font-weight: 500;
          display: flex;
          gap: 4px;
          cursor: pointer;
          align-items: center;

          &:hover {
            color: $colorBtnTertiary;
          }

          .icon {
            display: none;
            height: 26px;
            display: flex;
            align-items: center;
            margin-left: auto;

            &:hover {
              display: block;
            }
          }
        }
      }
    }

    .filter-dropdown-applied-filters-container {
      margin: 10px;

      .filter-dropdown-applied-filters-row {
        display: flex;
        justify-content: space-between;
        color: $colorTextSecondary;
        align-items: center;

        h3 {
          font-size: 20px;
          font-weight: 300;
        }

        & svg {
          cursor: pointer;
          padding: 4px;
          color: #ffabab;
          border-radius: 8px;

          &:hover {
            transition: 0.5s;
            background-color: #ffabab;
            color: $colorTextPrimary;
          }
        }
      }
      .filter-dropdown-applied-filters-inner {
        margin: 16px 0;
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        justify-content: start;

        .filter-dropdown-applied-filters-item {
          width: fit-content;
          padding: 10px 14px;
          background-color: $colorTextSecondary;
          border-radius: 20px;
          display: flex;
          align-items: center;
          gap: 8px;
          text-transform: uppercase;
          font-size: 16px;
          font-weight: 600;
          color: $colorTextPrimary;
          max-width: 290px;

          & svg {
            cursor: pointer;
          }
        }
      }
    }

    .filter-dropdown-price-range-container {
      margin: 16px 10px;

      .filter-dropdown-price-range-row {
        display: flex;
        gap: 10px;
        color: $colorTextSecondary;
        align-items: center;

        h3 {
          font-size: 20px;
          font-weight: 300;
        }

        .filter-dropdown-price-range-inputs {
          display: flex;
          align-items: center;
          gap: 10px;

          input {
            text-align: center;
            width: 56px;
            padding: 8px 0;
            border: none;
            background-color: $grey-dark;
            color: $colorTextSecondary;
          }

          p {
            color: $colorTextSecondary;
            font-size: 16px;
            width: fit-content;
          }
        }
      }

      .filter-dropdown-price-range-slider {
        margin: 32px 0;
      }
    }

    .filter-dropdown-only-avaliable-container {
      margin-top: 12px;
      display: flex;
      color: $colorTextSecondary;
      justify-content: start;
      align-items: center;
      gap: 4px;

      input {
        accent-color: #68e199;
        background-color: gray;
        height: 20px;
        width: 20px;
        margin: 0 10px;
      }

      h3 {
        font-size: 20px;
        font-weight: 300;
      }
    }

    .filter-dropdown-custom-filters {
      color: $colorTextSecondary;
      margin: 10px;
      flex-flow: wrap;
      display: flex;

      h4 {
        margin: 24px 0 0px;
        font-size: 20px;
        font-weight: 300;
      }

      .filter-dropdown-custom-filter-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
        width: 50%;
      }

      .filter-dropdown-custom-filter-subgroup {
        display: flex;
        flex-direction: column;
        gap: 8px;
      }
    }
  }
}

@media screen and ($tabletLarge) {
  .filter-dropdown-wrapper {
    padding: 16px 24px;

    .filter-dropdown-close-button {
      right: 10px;
      top: 10px;
    }

    .filter-dropdown-component-container {
      .filter-dropdown-applied-filters-container {
        height: 100%;
        justify-content: space-between;
        display: flex;
        flex-direction: column;

        .filter-dropdown-applied-filters-inner {
          width: 320px;
        }
      }

      .filter-dropdown-column {
        flex-flow: column-reverse;
        display: flex;
        position: relative;

        .filter-dropdown-custom-filters {
          width: 100%;
        }

        .filter-dropdown-applied-filters-row {
          width: 100%;
        }

        .filter-dropdown-price-range-slider {
          order: 1;
          background-color: blueviolet;
          width: 100%;
        }
      }
    }
  }
}

@media screen and ($tabletLarge) {
  .filter-dropdown-wrapper {
    .filter-dropdown-component-container {
      flex-direction: row;
      flex-wrap: wrap;

      .filter-dropdown-column {
        margin-top: 0px;
        margin-left: 20px;
        justify-content: start;
      }

      .filter-dropdown-custom-filters {
        gap: 16px 8px;
        max-height: 400px;
        flex-flow: column wrap;

        h4 {
          margin: 0;
        }

        .filter-dropdown-custom-filter-group {
          margin: 0 4px;
          padding: 0;
          width: fit-content;
          flex-wrap: wrap;
        }
      }

      .filter-dropdown-component-types-container {
        order: 0;
      }
    }
  }
}

@media screen and ($desktop) {
  .filter-dropdown-wrapper {
    height: fit-content;

    .filter-dropdown-close-button {
      right: 20px;
      top: 20px;
    }

    .filter-dropdown-component-container {
      flex-direction: row;
      flex-wrap: nowrap;
      max-width: 1200px;
      margin: 0 auto;

      .filter-dropdown-column {
        margin-left: auto;
      }
    }
  }
}
</style>
