<template>
  <div class="product-details-wrapper">
    <h2>{{ product.model }}</h2>
    <div class="product-details-container">
      <div class="product-details-product-image">
        <img src="../assets/keyboard.png" :alt="`${product.model} image`" />
      </div>
      <div class="product-details-info">
        <h5>Dostupno</h5>
        <h3>2.700,56 €</h3>
        <div class="product-details-logo-image">
          <img
            src="../assets/fosleen-logo.png"
            :alt="`${product.model} image`"
          />
        </div>

        <div class="product-details-data-container">
          <div class="product-details-data-row">
            <p>Brand:</p>
            <p>Razer</p>
          </div>
          <div class="product-details-data-row">
            <p>Vrsta priključka:</p>
            <p>USB</p>
          </div>
          <div class="product-details-data-row">
            <p>Tip:</p>
            <p>mehanička</p>
          </div>
          <div class="product-details-data-row">
            <p>Switchevi:</p>
            <p>žuti</p>
          </div>
          <div class="product-details-data-row">
            <p>RGB:</p>
            <p>da</p>
          </div>
        </div>
        <div class="product-details-btn-wrapper">
          <Button
            shape="trapezoid"
            text="Dodaj u košaricu"
            :style="{
              'background-color': '#D9D9D9',
              color: '#282828',
            }"
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
import Button from "../components/Button.vue";
import {
  PhShieldCheck,
  PhTruck,
  PhPackage,
  PhArrowUDownLeft,
} from "@phosphor-icons/vue";

const product = {
  id: 1,
  model: "Deatheater Elite 3XD",
  manufacturer_id: 1,
  description:
    "RAZER BlackWidow V3 Tenkeyless je kompaktna mehanička tipkovnica koja pruža vrhunsku igračku izvedbu. Sa skraćenim dizajnom bez numeričke tipke, pruža više prostora na radnoj površini i olakšava prijenos. Tipkovnica je opremljena s Razer Yellow mehaničkim switchevima koji pružaju taktilni i klikajući osjećaj pri svakom pritisku tipke. Ovi switchevi su dizajnirani za brze reakcije i pružaju izvanrednu trajnost od 80 milijuna pritisaka. BlackWidow V3 Tenkeyless također dolazi s individualno osvijetljenim Razer Chroma RGB tipkama koje pružaju beskrajne mogućnosti prilagodbe boja i efekata svjetlosti. Pomoću Razer Synapse softvera možete prilagoditi osvjetljenje, dodijeliti makro tipke i prilagoditi postavke tipkovnice prema svojim željama. Uz dodatne značajke poput N-Key Rollover i Anti-Ghosting tehnologija, ova tipkovnica omogućuje brzo i precizno tipkanje bez ikakvih problema. Svojim izdržljivim aluminijskim okvirom i odvojivim USB-C kabelom, RAZER BlackWidow V3 Tenkeyless je izdržljiva i praktična tipkovnica koja će vam pružiti izvrsno iskustvo igranja i produktivnosti.",
};
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

    .product-details-product-image {
      width: 250px;
      height: 250px;
      margin: 0 auto;

      & img {
        width: 100%;
        height: 100%;
        object-fit: cover;
      }
    }

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
        font-size: 16px;
        color: $grey-dark;
      }

      .product-details-detailed-data-container {
        border: 2px solid $colorTextSecondary;
        border-radius: 4px;
        padding: 16px;
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
</style>
