<template>
  <div class="searchbar-wrapper">
    <button>
      <PhMagnifyingGlass :size="32" color="#2e0167" />
    </button>
    <input
      type="text"
      id="searchbar"
      name="searchbar"
      class="searchbar"
      placeholder="Pretraži... "
    />
  </div>
</template>

<script setup>
import { PhMagnifyingGlass } from "@phosphor-icons/vue";
</script>

<style lang="scss">
@import "../utils/theme.scss";
.searchbar-wrapper {
  display: flex;
  flex-direction: row;
  .searchbar {
    background-color: $grey-light;
    border-style: none;
    border-radius: 0;
    padding-left: 8px;
  }

  button {
    padding: 0;
    padding-left: 40px;
    background-color: $grey-light;
    clip-path: polygon(0 0, 100% 0, 100% 100%, 32% 100%);
    width: 80px;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  ::placeholder {
    color: $purple-dark;
    font-weight: 600;
    font-size: 24px;
  }
}
</style>
