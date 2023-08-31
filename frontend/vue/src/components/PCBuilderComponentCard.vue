<template>
  <div :class="wrapperClasses">
    <div class="pc-builder-component-image-and-text-card-wrapper">
      <div class="pc-builder-component-card-image-wrapper">
        <img :src="Image" alt="" />
      </div>
      <div class="pc-builder-component-card-text-wrapper">
        <PCBuilderComponentCardList
          text-group-name="Najjača grafička kartica e"
          :text-group-items="[
            '6GB memorije',
            'Nvidia CUDA tehnologija',
            'Super za gaming',
          ]"
        />
      </div>
    </div>

    <div class="pc-builder-component-card-button-wrapper">
      <div class="price-wrapper">
        <p>3400 eur</p>
      </div>
    </div>
  </div>
</template>

<script setup>
import PCBuilderComponentCardList from "./PCBuilderComponentCardList.vue";

const { Image, className } = defineProps({
  Image: String,
  className: String,
});

const wrapperClasses = {
  [className]: className !== undefined,
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
