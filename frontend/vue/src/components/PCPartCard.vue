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
        <img :src="component.images[0]" alt="" />
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
          {{ `${component.price} &#x20AC` }}
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

const getModelName = () => {
  const modelName = component.productable_type.replace("App\\Models\\", "");
  return modelName;
};

console.log(getModelName());

console.log("component PROP PROSLJEDNEI JE", component);
</script>

<style lang="scss" scoped>
@import "../utils/theme.scss";
.pc-part-card-wrapper {
  background-color: #eaeaea;
  //width: 300px;
  padding-top: 12px;
  box-shadow: 0 0 20px #be166e;
  outline: 3px solid transparent;
  outline-offset: -3px;
  padding-left: 16px;
  padding-right: 16px;
  //max-width: 400px;
}

.pc-part-card-image-wrapper {
  background-color: white;
  height: 240px;
  width: 350px;
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
    font-size: 20px;
  }

  h2 {
    font-size: 32px;
    margin-bottom: 8px;
    color: $grey-dark;
  }
}

.pc-part-card-button-wrapper {
  display: flex;
  justify-content: center;
  padding-bottom: 16px;
}

.pc-part-card-link {
  text-decoration: none;
}
</style>
