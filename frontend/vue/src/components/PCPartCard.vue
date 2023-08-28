<template>
  <router-link
    :to="{
      name: 'ProductDetails',
      params: {
        productable_type: getModelName(),
        id: gpu.component.productable_id,
      },
    }"
    class="pc-part-card-link"
  >
    <div class="pc-part-card-wrapper">
      <div class="pc-part-card-image-wrapper">
        <img :src="Image" alt="" />
      </div>
      <div class="pc-part-card-text-wrapper">
        <PCPartCardList
          :text-group-name="gpu.model"
          :text-group-items="[`${gpu.memory} GB memorije`]"
        />

        <h3>Dostupno</h3>
        <h2 class="pc-part-card-price-wrapper">
          {{ `${gpu.component.price} E` }}
        </h2>
      </div>

      <div class="pc-part-card-button-wrapper">
        <Button shape="odd-shape" text="Dodaj u košaricu" />
      </div>
    </div>
  </router-link>
</template>

<script setup>
import Button from "./Button.vue";
import PCPartCardList from "./PCPartCardList.vue";

const { gpu } = defineProps({
  gpu: Object,
});

const getModelName = () => {
  const modelName = gpu.component.productable_type.replace("App\\Models\\", "");
  return modelName;
};

console.log("GPU PROP PROSLJEDNEI JE", gpu);
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
