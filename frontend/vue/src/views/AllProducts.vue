<template>
  <div>
    <div
      class="all-products-open-filter"
      @click="store.dispatch('toggleFilterDropdown')"
      v-if="!isFilterOpen"
    >
      FILTRIRAJ<PhSliders :size="28" />
    </div>
    <FilterDropdown v-if="isFilterOpen" />
    <router-link to="/mouse/1"> <p>Mis</p></router-link>
    <router-link to="/cpu/1"> <p>CPU</p></router-link>
    <router-link to="/gpu/1"> <p>GPU</p></router-link>
    <router-link to="/monitor/1"> <p>Monitor</p></router-link>
    <router-link to="/motherboard/1"> <p>Maticna</p></router-link>
    <router-link to="/keyboard/1"> <p>Tipkovnica</p></router-link>
  </div>
</template>

<script setup>
import FilterDropdown from "../components/FilterDropdown.vue";
import { PhSliders } from "@phosphor-icons/vue";
import store from "../store";
import { computed } from "vue";

const isFilterOpen = computed(() => store.state.filter.isOpen);
</script>

<style lang="scss">
@import "../utils/theme.scss";

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
  margin-left: auto;
  box-shadow: 0 4px 4px rgba(0, 0, 0, 0.5);

  &:hover {
    background-color: #19013a;
    transition: 0.5s;
  }
}
</style>
