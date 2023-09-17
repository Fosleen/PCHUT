<template>
  <div class="all-products-wrapper">
    <FilterDropdown v-if="isFilterOpen" />

    <div class="all-products-container">
      <div v-if="!isFilterOpen" class="all-products-menu">
        <div class="all-products-menu-item">
          <PhDesktopTower :size="20" />
          <p>LAPTOPI, RAČUNALA</p>
        </div>
        <div class="all-products-menu-item">
          <PhCpu :size="20" />
          <p>PROCESORI</p>
        </div>
        <div class="all-products-menu-item">
          <PhKeyboard :size="20" />
          <p>TIPKOVNICE</p>
        </div>
        <div class="all-products-menu-item">
          <PhMouse :size="20" />
          <p>MIŠEVI</p>
        </div>
        <div
          class="all-products-open-filter"
          @click="store.dispatch('toggleFilterDropdown')"
          v-if="!isFilterOpen"
        >
          FILTRIRAJ<PhSliders :size="28" />
        </div>
      </div>

      <router-link to="/mouse/1"> <p>Mis</p></router-link>
      <router-link to="/cpu/1"> <p>CPU</p></router-link>
      <router-link to="/gpu/1"> <p>GPU</p></router-link>
      <router-link to="/monitor/1"> <p>Monitor</p></router-link>
      <router-link to="/motherboard/1"> <p>Maticna</p></router-link>
      <router-link to="/keyboard/1"> <p>Tipkovnica</p></router-link>
    </div>
  </div>
</template>

<script setup>
import FilterDropdown from "../components/FilterDropdown.vue";
import {
  PhSliders,
  PhCpu,
  PhKeyboard,
  PhMouse,
  PhDesktopTower,
} from "@phosphor-icons/vue";
import store from "../store";
import { computed } from "vue";

const isFilterOpen = computed(() => store.state.filter.isOpen);
</script>

<style lang="scss">
@import "../utils/theme.scss";

.all-products-wrapper {
  .all-products-container {
    max-width: 1200px;
    margin: 0 auto;

    .all-products-menu {
      display: flex;
      gap: 24px;
      background-color: white;
      border-radius: 8px;
      width: fit-content;
      margin-left: auto;
      align-items: center;
      padding: 0 0 0 0;
      box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);
      margin-top: 24px;
      margin-right: 8px;

      .all-products-menu-item {
        gap: 4px;
        text-align: right;
        cursor: pointer;
        display: none;

        p {
          font-weight: 500;
        }

        svg {
          color: $colorTextTertiary;
        }
      }
    }

    .all-products-open-filter {
      background-color: $colorSecondary;
      width: fit-content;
      padding: 10px 16px;
      display: flex;
      align-items: center;
      gap: 8px;
      color: $white-dark;
      font-size: 24px;
      border-radius: 8px;
      cursor: pointer;

      &:hover {
        background-color: #19013a;
        transition: 0.5s;
      }
    }
  }
}

@media screen and ($tabletLarge) {
  .all-products-wrapper {
    .all-products-container {
      .all-products-menu {
        padding: 0 0 0 16px;

        .all-products-menu-item {
          display: flex;
          align-items: center;
        }
      }
    }
  }
}

@media screen and ($desktop) {
  .all-products-wrapper {
    .all-products-container {
      .all-products-menu {
        margin-right: 0px;
      }
    }
  }
}
</style>
