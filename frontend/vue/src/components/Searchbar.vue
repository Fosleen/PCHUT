<template>
  <div class="searchbar-wrapper">
    <button>
      <PhMagnifyingGlass :size="24" weight="bold" color="#2e0167" />
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

  button {
    height: 56px;
    padding: 0;
    padding-left: 40px;
    padding-right: 16px;
    background-color: $grey-light;
    clip-path: polygon(0 0, 100% 0, 100% 100%, 32% 100%);
    width: 160px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-top: 8px solid $colorPrimary;
    border-bottom: 8px solid $colorPrimary;
  }

  .searchbar {
    background-color: $grey-light;
    border-style: none;
    border-radius: 0;
    border-top: 8px solid $colorPrimary;
    border-bottom: 8px solid $colorPrimary;
    border-right: 8px solid $colorPrimary;
    padding-left: 8px;

    &:focus {
      outline: none;
    }

    &::placeholder {
      color: $purple-dark;
      font-weight: 600;
      font-size: 20px;
    }
  }
}
</style>
