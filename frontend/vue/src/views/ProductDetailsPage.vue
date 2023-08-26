<template>
  <div v-if="productLoading">Loading...</div>
  <div v-else class="product-details-wrapper">
    <h2>{{ product.model }}</h2>
    <div class="product-details-container">
      <ProductImagesCarousel :images="productImages" />

      <div class="product-details-info">
        <h5>Dostupno</h5>
        <h3>{{ product.price }} €</h3>
        <div class="product-details-logo-image">
          <img
            :src="`${product.manufacturer_img}`"
            :alt="`${product.manufacturer} logo`"
          />
        </div>

        <div class="product-details-data-container">
          <div class="product-details-data-row">
            <p>Brand:</p>
            <p>{{ product.manufacturer }}</p>
          </div>
          <div class="product-details-data-row">
            <p>Vrsta priključka:</p>
            <p>{{ product.connector }}</p>
          </div>
          <div class="product-details-data-row">
            <p>Tip:</p>
            <p>{{ product.type }}</p>
          </div>
          <div class="product-details-data-row">
            <p>Switchevi:</p>
            <p>{{ product.switch_type }}</p>
          </div>
          <div class="product-details-data-row">
            <p>RGB:</p>
            <p>{{ product.rgb ? "da" : "ne" }}</p>
          </div>
        </div>
        <div class="product-details-btn-wrapper">
          <Button
            shape="trapezoid"
            text="Dodaj u"
            :style="{
              'background-color': '#D9D9D9',
              color: '#282828',
            }"
            :icon="true"
          />
        </div>
      </div>
    </div>
    <div class="product-details-detailed-container">
      <h2>DETALJAN OPIS</h2>
      <div class="product-details-detailed-info">
        <p>{{ product.description }}</p>
        <div class="product-details-detailed-data-container">
          <div class="product-details-data-row">
            <PhShieldCheck :size="24" color="#5a01cc" />
            <p>Jamstvo:</p>
            <p>24 mjeseca</p>
          </div>
          <div class="product-details-data-row">
            <PhTruck :size="24" color="#5a01cc" />
            <p>Dostava:</p>
            <p>besplatna</p>
          </div>
          <div class="product-details-data-row">
            <PhPackage :size="24" color="#5a01cc" />
            <p>Isporuka:</p>
            <p>2-5 radnih dana</p>
          </div>
          <div class="product-details-data-row">
            <PhArrowUDownLeft :size="24" color="#5a01cc" />
            <p>Pravo povrata:</p>
            <p>14 dana</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, watch, computed } from "vue";
import store from "../store";
import { useRoute } from "vue-router";
import Button from "../components/Button.vue";
import ProductImagesCarousel from "../components/ProductImagesCarousel.vue";
import {
  PhShieldCheck,
  PhTruck,
  PhPackage,
  PhArrowUDownLeft,
} from "@phosphor-icons/vue";

const route = useRoute();
const productLoading = computed(() => store.state.currentProduct.loading);
const productImages = computed(() => product.value.images);

let product = ref({
  id: null,
  model: null,
  price: null,
  description: null,
  connector: null,
  type: null,
  wired: null,
  rgb: null,
  product_type: null,
  discount: null,
  manufacturer_img: null,
  manufacturer: null,
  switch_type: null,
  images: null,
});

watch(
  () => store.state.currentProduct.data,
  (newVal, oldVal) => {
    product.value = {
      ...JSON.parse(JSON.stringify(newVal)),
    };
  }
);

store.dispatch("getProduct", {
  id: route.params.id,
  productable_type: route.params.productable_type,
});
</script>

<style lang="scss">
@import "../utils/theme.scss";

.product-details-wrapper {
  background-color: $colorBgPrimary;

  h2 {
    color: $colorBtnPrimary;
    text-transform: uppercase;
    font-size: 28px;
    text-align: center;
    padding: 20px;
  }

  .product-details-container {
    display: flex;
    flex-direction: column;

    .product-details-info {
      padding: 16px;

      h5 {
        color: #0c8d12;
        font-size: 20px;
      }

      h3 {
        font-size: 28px;
      }

      .product-details-logo-image {
        width: 140px;
        background: white;

        & img {
          width: 100%;
          height: 100%;
          object-fit: cover;
        }
      }

      .product-details-data-container {
        border: 2px solid $colorTextSecondary;
        border-radius: 4px;
        padding: 16px;
      }

      .product-details-btn-wrapper {
        width: 100%;
        display: flex;
        justify-content: center;
      }
    }
  }

  .product-details-detailed-container {
    background-color: $white-dark;
    padding: 16px;
    display: flex;
    flex-direction: column;

    h2 {
      font-size: 28px;
      color: $grey-dark;
    }

    .product-details-detailed-info {
      background-color: $white-dark;
      display: flex;
      flex-direction: column;
      gap: 16px;

      p {
        text-align: justify;
        font-size: 20px;
        color: $grey-dark;
      }

      .product-details-detailed-data-container {
        border: 2px solid $colorTextSecondary;
        border-radius: 4px;
        padding: 16px;
        height: fit-content;
      }
    }
  }

  .product-details-data-row {
    display: flex;
    padding-bottom: 12px;
    margin-bottom: 12px;
    border-bottom: 1px solid $colorTextSecondary;
    align-items: center;
    gap: 16px;

    p {
      flex: 1;
      font-size: 20px;

      &:first-child {
        color: $colorTextPrimary;
      }
    }

    &:last-child {
      margin-bottom: 0;
      border-bottom: none;
      padding-bottom: 0;
    }
  }
}

@media screen and ($tablet) {
  .product-details-wrapper {
    .product-details-container {
      flex-direction: row;
      margin: 0 20px 0 28px;

      .product-details-info {
        flex: 1;

        .product-details-btn-wrapper {
          justify-content: end;
          padding-right: 16px;
        }
      }
    }

    .product-details-detailed-container {
      margin: 20px 0;

      .product-details-detailed-info {
        flex-direction: row;
        gap: 20px;
        padding: 20px;
        width: 100%;

        & p {
          font-size: 18px;
          width: 55%;
          &:first-child {
            font-size: 16px;
          }
        }

        & .product-details-detailed-data-container {
          flex: 1;
        }
      }
    }
  }
}

@media screen and ($desktop) {
  .product-details-wrapper {
    .product-details-container {
      margin: 0 auto;
      max-width: 1200px;
      display: flex;
      align-items: center;
      justify-content: center;

      .product-details-info {
        flex: 1;
        margin-right: 6px;

        .product-details-btn-wrapper {
          padding-right: 32px;
        }
      }
    }

    .product-details-detailed-container {
      display: flex;
      align-items: center;

      h2 {
        max-width: 1200px;
        width: 100%;
        padding: 20px 8px;
        text-align: left;
      }

      .product-details-detailed-info {
        max-width: 1200px;
        padding: 20px 8px;

        & p:first-child {
          font-size: 18px;
        }
      }
    }
  }
}
</style>
