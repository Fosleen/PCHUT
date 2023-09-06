<template>
  <div :class="wrapperClasses">
    <div class="pc-builder-component-image-and-text-card-wrapper">
      <div class="pc-builder-component-card-image-wrapper">
        <img :src="Image" alt="" />
      </div>
      <div class="pc-builder-component-card-text-wrapper">
        <PCBuilderComponentCardList
          v-if="component && component.product_type == 'Grafička'"
          :text-group-name="component.model"
          :text-group-items="[component.memory + 'GB memorije']"
        />

        <PCBuilderComponentCardList
          v-if="component && component.product_type == 'Procesor'"
          :text-group-name="component.model"
          :text-group-items="[
            component.cores + 'jezgri',
            component.socket + ' socket',
          ]"
        />

        <PCBuilderComponentCardList
          v-if="component && component.product_type == 'Matična ploča'"
          :text-group-name="component.model"
          :text-group-items="[component.socket + ' socket']"
        />
      </div>
    </div>

    <div class="pc-builder-component-card-button-wrapper">
      <div class="price-wrapper">
        <p>{{ component.price+ " &#x20AC" }}</p>
      </div>
    </div>
  </div>
</template>

<script setup>
import PCBuilderComponentCardList from "./PCBuilderComponentCardList.vue";

const { Image, className, component } = defineProps({
  Image: String,
  className: String,
  component: Object,
});

const wrapperClasses = {
  [className]: className !== undefined,
};

console.log("Ja dobim ovo", component);

const getModelName = () => {
  const modelName = component.productable_type.replace("App\\Models\\", "");
  return modelName;
};
</script>

<style lang="scss">
@import "../utils/theme.scss";

.pc-builder-component-small-card-wrapper {
  background-color: $grey-dark;
  width: 100%;
  box-shadow: 0 0 20px $pink;
  outline: 3px solid transparent;
  outline-offset: -3px;
  padding-top: 40px;
  display: flex;
  flex-direction: column;
  height: 100%;

  .pc-builder-component-card-text-group-name {
    color: $grey-light;
  }

  /* .pc-builder-component-card-list-item {
  } */
}
.pc-builder-component-card-wrapper {
  background-color: $grey-dark;
  width: 100%;
  padding-top: 40px;
  box-shadow: 0 0 20px $pink;
  outline: 3px solid transparent;
  outline-offset: -3px;

}

.pc-builder-component-card-image-wrapper {
  height: 400px;
  //max-height: 300px;
  margin-bottom: 36px;

  img {
    object-fit: contain;
    width: 100%;
    height: 100%;
  }
}

.pc-builder-component-card-button-wrapper {
  display: flex;
  justify-content: flex-end;
}

.pc-builder-component-image-and-text-card-wrapper {
  padding-left: 40px;
  padding-right: 40px;
}

.price-wrapper {
  background-color: $grey-light;
  width: 180px;
  text-align: center;
  clip-path: polygon(16% 0, 100% 0, 100% 100%, 0 100%);
  padding-bottom: 5px;
  padding-top: 5px;
  p {
    font-size: 30px;
    font-weight: 600;
    color: $purple-dark;
  }
}
</style>
