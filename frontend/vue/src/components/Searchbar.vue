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
      @input="handleInputChange($event.target.value)"
    />
    <div class="search-results" v-if="resultsLength > 0">
      <div
        v-for="result in searchResults"
        :key="result.id"
        class="search-results-item"
      >
        <img :src="result.images[0]" alt="" />

        <p>
          {{
            result.product_type_cro +
            " " +
            result.manufacturer.name +
            " " +
            result.model
          }}
        </p>
        <p>{{ result.price }} &#x20AC;</p>
      </div>
    </div>
  </div>
</template>

<script setup>
import { PhMagnifyingGlass } from "@phosphor-icons/vue";
import { ref, computed } from "vue";
import { getAllComponents } from "../api/api";

const searchResults = ref([]);
const resultsLength = computed(() =>
  searchResults.value ? searchResults.value.length : 0
);

const handleInputChange = async (phrase) => {
  const response = await getAllComponents();
  const data = response.components;

  searchResults.value = data.filter((item) =>
    item.model.toLowerCase().includes(phrase.toLowerCase())
  );
};
</script>

<style lang="scss">
@import "../utils/theme.scss";

.searchbar-wrapper {
  display: flex;
  flex-direction: row;
  position: relative;

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

.search-results {
  position: absolute;
  top: 100%;
  left: 0;
  width: 100%;
  background-color: $colorTextTertiary;
  border: 1px solid #ccc;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  z-index: 1000;
}

.search-results {
  //background-color: red;
  z-index: 15000;
  //position: absolute;
}

.search-results-item {
  border-top: 1px solid $colorTextTertiary;
  border-bottom: 1px solid $colorTextTertiary;
  gap: 12px;

  display: flex;
  flex-direction: row;
  //color: blue;
  align-items: center;

  &:hover {
    color: green;
  }

  img {
    width: 100px;
    padding: 4px;
    //border: 1px solid blue;
  }
}
</style>
