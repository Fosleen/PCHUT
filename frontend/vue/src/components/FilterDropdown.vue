<template>
  <div class="filter-dropdown-wrapper">
    <div class="filter-dropdown-component-container">
      <div class="filter-dropdown-component-types-container">
        <ul class="">
          <li><PhCpu :size="26" />LAPTOPI, RAČUNALA</li>
          <li><PhCpu :size="26" />PROCESORI</li>
          <li><PhCpu :size="26" />GRAFIČKE KARTICE</li>
          <li><PhCpu :size="26" />MATIČNE PLOČE</li>
          <li><PhCpu :size="26" />HLAĐENJE</li>
          <li><PhCpu :size="26" />MEMORIJA</li>
          <li><PhKeyboard :size="26" />TIPKOVNICE</li>
          <li><PhMouse :size="26" />MIŠEVI</li>
          <li><PhMonitor :size="26" />MONITORI</li>
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
        <div class="filter-dropdown-custom-filter-cores">
          <h4>BROJ JEZGRI</h4>
          <CheckboxInput
            value="1"
            name="cores"
            id="core-1"
            @checkbox-click="changeCheckboxes('core-1', 'cores')"
          />
          <CheckboxInput
            value="2"
            name="cores"
            id="core-2"
            @checkbox-click="changeCheckboxes('core-2', 'cores')"
          />
          <CheckboxInput
            value="3"
            name="cores"
            id="core-3"
            @checkbox-click="changeCheckboxes('core-3', 'cores')"
          />
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
import { ref } from "vue";
import RangeSlider from "./RangeSlider.vue";
import CheckboxInput from "./CheckboxInput.vue";

let minRange = ref(0); // default values
let maxRange = ref(6000);

const cores = ref([]);

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

      .filter-dropdown-custom-filter-cores {
        display: flex;
        flex-direction: column;
        gap: 8px;
      }
    }
  }
}
</style>
