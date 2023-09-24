<template>
  <div class="shopping-cart-item-wrapper">
    <div class="shopping-cart-item-icon">
      <PhTrash :size="24" />
    </div>
    <div class="shopping-cart-item-image-wrapper">
      <div class="shopping-cart-item-image">
        <img :src="props.item.img" :alt="props.item.title" />
      </div>
    </div>
    <div class="shopping-cart-item-info">
      <h4>
        {{ props.item.product_type_cro }} {{ props.item.manufacturer }}
        {{ props.item.model }}
      </h4>
      <QuantityCalculator :quantity="quantity" @change-quantity="change" />
      <div>
        <h3>{{ (props.item.price * quantity).toFixed(2) }} €</h3>
        <p>1 kom = {{ props.item.price.toFixed(2) }} €</p>
      </div>
    </div>
  </div>
</template>

<script setup>
import { PhTrash } from "@phosphor-icons/vue";
import { ref } from "vue";
import QuantityCalculator from "./QuantityCalculator.vue";
const props = defineProps({
  item: Object,
});

const emit = defineEmits();
let quantity = ref(props.item.quantity);

function change(newQuantity) {
  quantity.value = newQuantity;
  emit("changeQuantity", quantity.value);
}
</script>

<style lang="scss">
@import "../utils/theme.scss";

.shopping-cart-item-wrapper {
  width: 100%;
  background-color: $colorBgPrimary;
  display: flex;
  align-items: center;
  padding: 4px;

  .shopping-cart-item-info {
    flex: 4;
    padding: 12px 0px;

    h4 {
      font-size: 16px;
      color: $colorTextPrimary;
    }

    h3 {
      font-size: 20px;
      color: $colorTextPrimary;
    }

    p {
      font-size: 12px;
      color: $colorTextTertiary;
    }
  }

  .shopping-cart-item-icon {
    display: none;
  }

  .shopping-cart-item-image-wrapper {
    background-color: $white-dark;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 130px;
    margin: 12px;
    width: 130px;

    .shopping-cart-item-image {
      display: flex;
      justify-content: center;
      align-items: center;

      img {
        padding: 0px;
        width: 100%;
        height: 100%;
        max-height: 130px;
        object-fit: cover;
      }
    }
  }
}

@media screen and ($tablet) {
  .shopping-cart-item-wrapper {
    .shopping-cart-item-icon {
      display: block;
      color: $colorBtnPrimary;
      margin: 8px;
      align-items: center;
      display: flex;
      padding: 12px;

      &:hover {
        background-color: $colorBtnPrimary;
        color: $colorTextSecondary;
        border-radius: 8px;
        transition: 0.5s;
        cursor: pointer;
      }
    }

    .shopping-cart-item-info {
      flex: 2;
      padding: 20px;

      h4 {
        font-size: 18px;
      }

      h3 {
        font-size: 20px;
      }

      p {
        font-size: 12px;
      }
    }

    .shopping-cart-item-image-wrapper {
      height: 180px;
      margin: 12px;
      width: 180px;
    }
  }
}

@media screen and ($desktop) {
  .shopping-cart-item-wrapper {
    max-width: 1200px;

    .shopping-cart-item-info {
      display: flex;
      align-items: center;
      justify-content: space-between;

      h4 {
        font-size: 20px;
        max-width: 380px;
      }

      h3 {
        font-size: 24px;
      }

      p {
        margin-top: 4px;
        font-size: 16px;
      }
    }
  }
}
</style>
