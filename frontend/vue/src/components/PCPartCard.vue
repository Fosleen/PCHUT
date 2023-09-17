<template>
  <router-link
    :to="{
      name: 'ProductDetails',
      params: {
        productable_type: getModelName(),
        id: component.productable_id,
      },
    }"
    class="pc-part-card-link"
  >
    <div class="pc-part-card-wrapper">
      <div class="pc-part-card-image-wrapper">
        <img :src="image" alt="" />
      </div>
      <div class="pc-part-card-text-wrapper">
        <PCPartCardList
          v-if="getModelName() == 'GPU'"
          :text-group-name="component.model"
          :text-group-items="[component.memory + 'GB memorije']"
        />
        <PCPartCardList
          v-if="getModelName() == 'CPU'"
          :text-group-name="component.model"
          :text-group-items="[
            component.cores + ' jezgri',
            component.socket + ' socket',
          ]"
        />

        <PCPartCardList
          v-if="getModelName() == 'Motherboard'"
          :text-group-name="component.model"
          :text-group-items="[component.socket + ' socket']"
        />

        <PCPartCardList
          v-if="getModelName() == 'RAM'"
          :text-group-name="component.model"
          :text-group-items="[component.speed + ' MHz']"
        />

        <h3>Dostupno</h3>
        <h2 class="pc-part-card-price-wrapper">
          {{ `${component.price} &#x20AC;` }}
        </h2>
      </div>

      <div class="pc-part-card-button-wrapper">
        <Button
          shape="odd-shape"
          text="Dodaj u"
          :style="{
            'background-color': '#D9D9D9',
            color: '#282828',
          }"
          :icon="true"
          :is-small="true"
        />
      </div>
    </div>
  </router-link>
</template>

<script setup>
import Button from "./Button.vue";
import PCPartCardList from "./PCPartCardList.vue";

const { component } = defineProps({
  component: Object,
});

const image =
  component.images.length === 0
    ? [
        "https://www.mobismea.com/upload/iblock/2a0/2f5hleoupzrnz9o3b8elnbv82hxfh4ld/No%20Product%20Image%20Available.png",
      ]
    : component.images;

const getModelName = () => {
  const modelName = component.productable_type.replace("App\\Models\\", "");
  return modelName;
};
</script>

<style lang="scss" scoped>
@import "../utils/theme.scss";
.pc-part-card-wrapper {
  background-color: $white-dark;
  width: 100%;
  box-shadow: 0 0 8px #eebdd6;
  outline: 3px solid transparent;
  outline-offset: -3px;
  padding: 8px 8px 0;

  .pc-part-card-image-wrapper {
    background-color: white;
    height: 32vw;
    width: 100%;
    margin-bottom: 16px;

    img {
      object-fit: contain;
      height: 100%;
      width: 100%;
    }
  }

  .pc-part-card-text-wrapper {
    h3 {
      color: $colorSuccess;
      font-size: 14px;
    }

    h2 {
      font-size: 20px;
      margin-bottom: 8px;
      color: $grey-dark;
    }
  }

  .pc-part-card-button-wrapper {
    display: flex;
    justify-content: center;
    padding-bottom: 8px;
  }
}

.pc-part-card-link {
  text-decoration: none;
}

@media screen and ($tablet) {
  .pc-part-card-wrapper {
    padding: 12px 12px 0;

    .pc-part-card-text-wrapper {
      h3 {
        font-size: 20px;
      }

      h2 {
        font-size: 32px;
        margin-bottom: 16px;
      }
    }

    .pc-part-card-button-wrapper {
      padding-bottom: 16px;
    }
  }
}

@media screen and ($tabletLarge) {
  .pc-part-card-wrapper {
    .pc-part-card-image-wrapper {
      height: 16vw;
    }

    .pc-part-card-text-wrapper {
      h3 {
        color: $colorSuccess;
        font-size: 16px;
      }

      h2 {
        font-size: 24px;
        margin-bottom: 8px;
        color: $grey-dark;
      }
    }

    .pc-part-card-button-wrapper {
      padding-bottom: 16px;
    }
  }
}

@media screen and ($desktop) {
  .pc-part-card-wrapper {
    padding: 12px 16px 0;

    .pc-part-card-image-wrapper {
      height: 200px;
    }

    .pc-part-card-text-wrapper {
      h3 {
        font-size: 20px;
      }

      h2 {
        font-size: 32px;
      }
    }

    .pc-part-card-button-wrapper {
      padding-bottom: 16px;
    }
  }
}
</style>
