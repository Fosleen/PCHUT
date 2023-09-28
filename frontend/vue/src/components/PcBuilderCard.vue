<template>
  <div :class="wrapperClasses">
    <div class="pc-builder-component-image-and-text-card-wrapper">
      <div class="pc-builder-component-card-image-wrapper">
        <img :src="Image" alt="" />
      </div>
      <div class="pc-builder-component-card-text-wrapper">
        <PcBuilderComponentCardList
          v-if="component && component.product_type_cro == 'Grafička kartica'"
          :text-group-name="
            component.product_type_cro +
            ' ' +
            component.manufacturer.name +
            ' ' +
            component.model
          "
          :text-group-items="[component.memory + ' GB memorije']"
        />
        <PcBuilderComponentCardList
          v-if="component && component.product_type_cro == 'Procesor'"
          :text-group-name="
            component.product_type_cro +
            ' ' +
            component.manufacturer.name +
            ' ' +
            component.model
          "
          :text-group-items="[
            component.cores + ' jezgri',
            component.socket.name + ' podnožje',
          ]"
        />
        <PcBuilderComponentCardList
          v-if="component && component.product_type_cro == 'Matična ploča'"
          :text-group-name="
            component.product_type_cro +
            ' ' +
            component.manufacturer.name +
            ' ' +
            component.model
          "
          :text-group-items="[component.socket.name + ' podnožje']"
        />

        <PcBuilderComponentCardList
          v-if="component && component.product_type_cro == 'Pohrana'"
          :text-group-name="
            component.product_type_cro +
            ' ' +
            component.manufacturer.name +
            ' ' +
            component.model
          "
          :text-group-items="[]"
        />
        <PcBuilderComponentCardList
          v-if="component && component.product_type_cro == 'Napajanje'"
          :text-group-name="
            component.product_type_cro +
            ' ' +
            component.manufacturer.name +
            ' ' +
            component.model
          "
          :text-group-items="[]"
        />
      </div>
    </div>

    <div class="pc-builder-component-card-button-wrapper">
      <div class="price-wrapper">
        <p>{{ component.price.toFixed(2) + " €" }}</p>
      </div>
    </div>
  </div>
</template>

<script setup>
import PcBuilderComponentCardList from "./PcBuilderComponentCardList.vue";

const { Image, className, component } = defineProps({
  Image: [Array, String],
  className: String,
  component: Object,
});

const wrapperClasses = {
  [className]: className !== undefined,
};
</script>

<style lang="scss">
@import "../utils/theme.scss";

@mixin card-wrapper {
  background-color: $grey-dark;
  width: 100%;
  box-shadow: 0 0 20px $pink;
  outline: 3px solid transparent;
  outline-offset: -3px;
}

.pc-builder-component-small-card-wrapper {
  @include card-wrapper;
  padding-top: 0;
  display: flex;
  flex-direction: column;
  height: 100%;
  cursor: pointer;

  .pc-builder-component-card-text-group-name {
    color: $grey-light;
    font-size: 20px;
  }

  &.white-bg {
    background-color: $white-dark;
    box-shadow: none;

    .pc-builder-component-card-text-group-name {
      color: $colorTextPrimary;
    }
  }

  &.list-item-none {
    .pc-builder-component-card-list-item {
      display: none;
    }
  }
}

.pc-builder-component-card-wrapper {
  @include card-wrapper;
  padding-top: 40px;
}

.pc-builder-component-card-button-wrapper {
  display: flex;
  justify-content: flex-end;
  margin-top: auto;

  .price-wrapper {
    background-color: $grey-light;
    width: fit-content;
    clip-path: polygon(16% 0, 100% 0, 100% 100%, 0 100%);
    padding-bottom: 5px;
    padding-top: 5px;

    p {
      text-align: right;
      width: 120px;
      padding-right: 8px;
      font-size: 24px;
      font-weight: 600;
      color: $purple-dark;
    }
  }
}

.pc-builder-component-image-and-text-card-wrapper {
  padding: 0 16px;

  .pc-builder-component-card-image-wrapper {
    height: 24vw;
    width: 100%;
    padding: 0px; //padding: 24px;
    margin: 16px 0;

    img {
      object-fit: cover;
      width: 100%;
      height: 100%;
    }
  }
}

@media screen and ($tablet) {
  .pc-builder-component-card-image-wrapper {
    height: 150px;
    padding: 0;
  }

  .pc-builder-component-small-card-wrapper {
    @include card-wrapper;
    padding-top: 16px;
    display: flex;
    flex-direction: column;
    height: 320px;

    .pc-builder-component-card-text-group-name {
      font-size: 20px;
    }
  }

  .pc-builder-component-image-and-text-card-wrapper {
    padding: 0 16px;

    .pc-builder-component-card-image-wrapper {
      height: 200px;
      width: 100%;
      padding: 8px;
      margin: 0;
    }
  }

  .pc-builder-component-card-text-wrapper {
    margin-top: 24px;
  }
}

@media screen and ($tabletLarge) {
  .pc-builder-component-card-image-wrapper {
    height: 180px;
  }

  .pc-builder-component-small-card-wrapper {
    height: 400px;
  }

  .pc-builder-component-card-list-item {
    font-size: 18px;
  }
}

@media screen and ($desktop) {
  .pc-builder-component-small-card-wrapper {
    height: 420px;
  }

  .pc-builder-component-card-list-item {
    font-size: 20px;
  }

  .pc-builder-component-image-and-text-card-wrapper {
    padding: 0 16px;

    .pc-builder-component-card-image-wrapper {
      height: 240px;
      width: 100%;
      padding: 8px;
      margin: 0;
    }
  }

  .pc-builder-component-small-card-wrapper {
    &.white-bg {
      height: 380px;
    }
  }
}
</style>
