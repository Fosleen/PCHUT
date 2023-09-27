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
      placeholder="Pretraži po modelu... "
      @input="handleInputChange($event.target.value)"
    />
    <div class="search-results" v-if="resultsLength > 0">
      <div v-for="result in searchResults" :key="result.id">
        <router-link
          class="search-results-item"
          :to="`/${getModelName(result.productable_type)}/${result.id}`"
        >
          <img
            :src="
              result.images[0]
                ? result.images[0]
                : [
                    'https://www.mobismea.com/upload/iblock/2a0/2f5hleoupzrnz9o3b8elnbv82hxfh4ld/No%20Product%20Image%20Available.png',
                  ]
            "
            :alt="result.model"
          />
          <p>
            {{
              result.product_type_cro +
              " " +
              result.manufacturer.name +
              " " +
              result.model
            }}
          </p>
          <p class="price">{{ result.price }} €</p>
        </router-link>
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

const getModelName = (item) => {
  const modelName = item.replace("App\\Models\\", "");
  return modelName;
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
    clip-path: polygon(0 0, 100% 0, 100% 100%, 50% 100%);
    width: 80px;
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
    width: 400px;

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
  z-index: 15000;
  position: absolute;
  top: 100%;
  right: 0;
  width: 444px;
  background-color: $colorPrimary;
  padding: 0 8px 5px 5px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.6);
  z-index: 1000;
  border-radius: 0 0 0 8px;

  & > * {
    background-color: $colorBgSecondary;
    border-bottom: 2px solid $colorTextTertiary;
  }

  & > :last-of-type {
    border-top: none;
    border-bottom: none;
    border-radius: 0 0 0 4px;
  }

  .search-results-item {
    gap: 12px;
    display: flex;
    flex-direction: row;
    align-items: center;

    p.price {
      flex: none;
      margin-right: 8px;
    }

    &:hover {
      color: green;
    }

    img {
      width: 100px;
      padding: 4px;
    }
  }
}
</style>
