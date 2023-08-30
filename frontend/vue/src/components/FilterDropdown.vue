<template>
  <div class="filter-dropdown-wrapper">
    <div class="filter-dropdown-close-button">
      <PhX :size="32" @click="store.dispatch('toggleFilterDropdown')" />
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
} from "@phosphor-icons/vue";
import { ref, computed } from "vue";
import RangeSlider from "./RangeSlider.vue";
import CheckboxInput from "./CheckboxInput.vue";
import store from "../store";

const isFilterOpen = computed(() => store.state.filter.isOpen);

let minRange = ref(0); // default values
let maxRange = ref(6000);

const componentTypes = [
  "LAPTOPI, PC",
  "PROCESORI",
  "GRAFIČKE KARTICE",
  "MATIČNE PLOČE",
  "HLAĐENJE",
  "MEMORIJA",
  "TIPKOVNICE",
  "MIŠEVI",
  "MONITORI",
];

const selectedComponentType = ref("");
let cores = ref([]);
let manufacturers = ref([]);
let series = ref([]);
let appliedFilters = ref([cores, manufacturers, series]);

function displayFilter(componentType) {
  clearArray(manufacturers);
  clearArray(cores);
  clearArray(series);

  selectedComponentType.value = componentType;
}

function clearArray(name) {
  // console.log("delete " + JSON.parse(JSON.stringify(name.value)));
  name.value = [];
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
        width: 320px;

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
      .filter-dropdown-column {
        flex-flow: column-reverse;
        display: flex;

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
    .filter-dropdown-close-button {
      right: 20px;
      top: 20px;
    }

    .filter-dropdown-component-container {
      flex-direction: row;
      flex-wrap: nowrap;
      max-width: 1200px;
      margin: 0 auto;

      .filter-dropdown-custom-filters {
        /* width: fit-content; */
      }
      .filter-dropdown-column {
        /* width: fit-content; */
        margin-left: auto;
      }
    }
  }
}
</style>
