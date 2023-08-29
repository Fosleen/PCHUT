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
        <div class="filter-dropdown-close-button"><PhX :size="32" /></div>
      </div>
      <div class="filter-dropdown-applied-filters">
        <div class="filter-dropdown-applied-filters-title">
          <h3>PRIMIJENJENI FILTERI:</h3>
          <PhTrash :size="26" color="#FFABAB" />
        </div>
        <div class="filter-dropdown-applied-filters-container">
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
      <div class="filter-dropdown-price-range">
        <div class="filter-dropdown-price-range-title">
          <h3>RASPON CIJENE:</h3>
        </div>
        <p>-------O-----O--</p>
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

    .filter-dropdown-applied-filters {
      margin: 10px;

      .filter-dropdown-applied-filters-title {
        display: flex;
        justify-content: space-between;
        color: $colorTextSecondary;

        h3 {
          font-size: 20px;
          font-weight: 300;
        }
      }
      .filter-dropdown-applied-filters-container {
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
        }
      }
    }
  }
}
</style>
