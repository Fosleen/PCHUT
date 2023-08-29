<template>
  <div class="filter-dropdown-wrapper">
    <div class="filter-dropdown-component-container">
      <div class="filter-dropdown-component-types-container">
        <ul class="">
          <li @click="displayFilter('pc')">
            <PhCpu :size="26" />LAPTOPI, RAČUNALA
          </li>
          <li @click="displayFilter('cpu')"><PhCpu :size="26" />PROCESORI</li>
          <li @click="displayFilter('gpu')">
            <PhCpu :size="26" />GRAFIČKE KARTICE
          </li>
          <li @click="displayFilter('motherboard')">
            <PhCpu :size="26" />MATIČNE PLOČE
          </li>
          <li @click="displayFilter('cooling')">
            <PhCpu :size="26" />HLAĐENJE
          </li>
          <li @click="displayFilter('memory')"><PhCpu :size="26" />MEMORIJA</li>
          <li @click="displayFilter('keyboard')">
            <PhKeyboard :size="26" />TIPKOVNICE
          </li>
          <li @click="displayFilter('mouse')"><PhMouse :size="26" />MIŠEVI</li>
          <li @click="displayFilter('monitor')">
            <PhMonitor :size="26" />MONITORI
          </li>
        </ul>
        <div class="filter-dropdown-close-button">
          <PhX :size="32" />
        </div>
      </div>
      <div class="filter-dropdown-applied-filters-container">
        <div class="filter-dropdown-applied-filters-row">
          <h3>PRIMIJENJENI FILTERI:</h3>
          <PhTrash :size="26" color="#FFABAB" />
        </div>
        <div class="filter-dropdown-applied-filters-inner">
          <div class="filter-dropdown-applied-filters-item">
            <PhX weight="bold" /> tipkovnice
          </div>
          <div class="filter-dropdown-applied-filters-item">
            <PhX weight="bold" /> ducky
          </div>
          <div class="filter-dropdown-applied-filters-item">
            <PhX weight="bold" /> rgb
          </div>
          <div class="filter-dropdown-applied-filters-item">
            <PhX weight="bold" /> 80 - 250 €
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

      <div class="filter-dropdown-custom-filters">
        <div
          v-if="isTypeShown('cpu')"
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
          v-if="isTypeShown('cpu')"
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
          v-if="isTypeShown('cpu')"
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
} from "@phosphor-icons/vue";
import { ref, computed } from "vue";
import RangeSlider from "./RangeSlider.vue";
import CheckboxInput from "./CheckboxInput.vue";

let minRange = ref(0); // default values
let maxRange = ref(6000);

const selectedComponentType = ref("");
let cores = ref([]);
let manufacturers = ref([]);
let series = ref([]);

function displayFilter(componentType) {
  manufacturers.value = [];
  cores.value = [];
  series.value = [];

  selectedComponentType.value = componentType;
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
  console.log(JSON.parse(JSON.stringify(manufacturers.value)));

  return this[groupName].includes(name);
}

function isTypeShown(groupName) {
  return selectedComponentType.value === groupName;
}
</script>

<style lang="scss">
@import "../utils/theme.scss";

.filter-dropdown-wrapper {
  width: 100%;
  background-color: $colorTextPrimary;

  .filter-dropdown-component-container {
    padding: 4px;
    display: flex;
    flex-direction: column;

    .filter-dropdown-component-types-container {
      position: relative;

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
          gap: 8px;
          cursor: pointer;

          &:hover {
            color: $colorBtnTertiary;
          }
        }
      }

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
      }
      .filter-dropdown-applied-filters-inner {
        margin: 16px 0;
        display: flex;
        flex-wrap: wrap;
        gap: 8px;

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

      h4 {
        margin: 24px 0 0px;
        font-size: 20px;
        font-weight: 300;
      }

      .filter-dropdown-custom-filter-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
      }

      .filter-dropdown-custom-filter-subgroup {
        display: flex;
        flex-direction: column;
        gap: 8px;
      }
    }
  }
}
</style>
