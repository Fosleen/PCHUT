<template>
  <router-link
    :to="{
      name: 'ProductDetails',
      params: {
        productable_type: getModelName(),
        id: component.productable_id,
      },
    }"
    class="discount-part-card-link"
  >
    <div class="discount-part-card-wrapper">
      <div
        class="discount-part-card-image-wrapper"
        v-if="component.images.length > 0"
      >
        <img :src="component.images[0]" alt="" />
      </div>

      <div class="discount-part-card-image-wrapper" v-else>
        <img
          src="https://www.mobismea.com/upload/iblock/2a0/2f5hleoupzrnz9o3b8elnbv82hxfh4ld/No%20Product%20Image%20Available.png"
          alt=""
        />
      </div>
      <div class="discount-part-card-text-wrapper">
        <PCPartCardList
          v-if="getModelName() == 'GPU'"
          :text-group-name="
            component.product_type_cro +
            ' ' +
            component.manufacturer.name +
            ' ' +
            component.model
          "
          :text-group-items="[component.memory + 'GB memorije']"
        />
        <PCPartCardList
          v-if="getModelName() == 'CPU'"
          :text-group-name="
            component.product_type_cro +
            ' ' +
            component.manufacturer.name +
            ' ' +
            component.model
          "
          :text-group-items="[
            component.cores + ' jezgri',
            component.socket_name + ' socket',
          ]"
        />

        <PCPartCardList
          v-if="getModelName() == 'Motherboard'"
          :text-group-name="
            component.product_type_cro +
            ' ' +
            component.manufacturer.name +
            ' ' +
            component.model
          "
          :text-group-items="[component.socket_name + ' socket']"
        />

        <PCPartCardList
          v-if="getModelName() == 'Mouse'"
          :text-group-name="
            component.product_type_cro +
            ' ' +
            component.manufacturer.name +
            ' ' +
            component.model
          "
          :text-group-items="[component.dpi + ' DPI']"
        />

        <PCPartCardList
          v-if="getModelName() == 'Keyboard'"
          :text-group-name="
            component.product_type_cro +
            ' ' +
            component.manufacturer.name +
            ' ' +
            component.model
          "
          :text-group-items="[component.switch_type_name + ' switchevi']"
        />

        <PCPartCardList
          v-if="getModelName() == 'RAM'"
          :text-group-name="
            component.product_type_cro +
            ' ' +
            component.manufacturer.name +
            ' ' +
            component.model
          "
          :text-group-items="[component.dpi + ' DPI']"
        />

        <h3>Dostupno</h3>

        <div class="discount-part-card-prices-wrapper">
          <h2 class="discount-part-card-price-wrapper">
            {{ `${component.price.toFixed(2)} €` }}
          </h2>

          <h2 class="discount-part-card-discount-price-wrapper">
            {{ `${component.discount.toFixed(2)} €` }}
          </h2>
        </div>
      </div>

      <div class="discount-part-card-button-wrapper">
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
import PCPartCardList from "./PCPartCardList.vue";
import Button from "./Button.vue";

const getModelName = () => {
  const modelName = component.productable_type.replace("App\\Models\\", "");
  return modelName;
};

const { component } = defineProps({
  component: Object,
});
</script>

<style lang="scss" scoped>
@import "../utils/theme.scss";

.discount-part-card-wrapper {
  box-shadow: 0 0 8px #eebdd6;
  width: 100%;
  padding-top: 12px;
  outline: 3px solid transparent;
  outline-offset: -3px;
  padding-left: 16px;
  padding-right: 16px;
}

.discount-part-card-image-wrapper {
  background-color: white;
  height: 240px;
  width: 100%;
  margin-bottom: 16px;

  img {
    object-fit: contain;
    height: 100%;
    width: 100%;
  }
}

.discount-part-card-text-wrapper {
  h3 {
    color: $colorSuccess;
    font-size: 20px;
  }

  h2 {
    font-size: 28px;
    margin-bottom: 8px;
  }
}

.discount-part-card-button-wrapper {
  display: flex;
  justify-content: center;
  padding-bottom: 16px;
}

.discount-part-card-link {
  text-decoration: none;
}

.discount-part-card-price-wrapper {
  color: $pink;
}
.discount-part-card-prices-wrapper {
  display: flex;
  justify-content: space-between;
}

.discount-part-card-discount-price-wrapper {
  text-decoration: line-through;
}

@media screen and ($desktop) {
  .discount-part-card-wrapper {
    /* width: 400px; */
  }
}
</style>
