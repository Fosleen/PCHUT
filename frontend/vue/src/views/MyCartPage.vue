<template>
  <div class="my-cart-wrapper">
    <div class="my-cart-container">
      <div class="my-cart-items-container">
        <div class="my-cart-items-header">
          <router-link to="/proizvodi">
            <Button shape="odd-shape-reversed" text="Povratak u trgovinu" />
          </router-link>
          <p>Proizvod</p>
          <p>Količina</p>
          <p>Cijena</p>
        </div>
        <div class="my-cart-items-list">
          <ShoppingCartItem
            :item="{
              manufacturer: 'Gigabyte',
              model: 'GeForce GTX 1080',
              memory: '32 GB',
              price: '1499.99',
              img: 'https://www.pngmart.com/files/7/Graphics-Card-Transparent-Background.png',
            }"
          />
          <ShoppingCartItem
            :item="{
              manufacturer: 'Gigabyte',
              model: 'GeForce GTX 1080',
              memory: '32 GB',
              price: '1499.99',
              img: 'https://www.pngmart.com/files/7/Graphics-Card-Transparent-Background.png',
            }"
          />
          <ShoppingCartItem
            :item="{
              manufacturer: 'Gigabyte',
              model: 'GeForce GTX 1080',
              memory: '32 GB',
              price: '1499.99',
              img: 'https://www.pngmart.com/files/7/Graphics-Card-Transparent-Background.png',
            }"
          />
        </div>
        <div class="my-cart-items-total-price-wrapper">
          <div class="my-cart-items-total-price"><p>8010.65 €</p></div>
        </div>
      </div>
      <div class="my-cart-details-container">
        nastavi na placanje i ostale stvari
      </div>
    </div>
  </div>
</template>

<script setup>
import Button from "../components/Button.vue";
import ShoppingCartItem from "../components/ShoppingCartItem.vue";
</script>

<style lang="scss">
@import "../utils/theme.scss";

.my-cart-wrapper {
  .my-cart-container {
    background-color: $colorBgPrimary;
    max-width: 1200px;
    margin: 0 auto;

    .my-cart-items-container {
      .my-cart-items-header {
        display: none;
      }

      .my-cart-items-total-price-wrapper {
        justify-content: end;
        text-align: right;

        display: flex;
        width: 100%;

        .my-cart-items-total-price {
          border-top: 1px solid $grey-dark;
          width: 200px;
          padding: 8px 32px;
          font-weight: 700;
          margin-right: 20px;

          p {
            font-size: 24px;
          }
        }
      }
    }
  }
}

@media screen and ($tablet) {
}

@media screen and ($desktop) {
  .my-cart-wrapper {
    .my-cart-container {
      .my-cart-items-container {
        .my-cart-items-header {
          border-bottom: 1px solid $grey-dark;
          display: flex;
          justify-content: space-between;
          align-items: center;
          padding: 20px 60px 0px 0;

          p {
            font-weight: 700;
          }
        }

        .my-cart-items-total-price-wrapper {
          .my-cart-items-total-price {
            width: 300px;
            margin-right: 0;

            p {
              font-size: 28px;
            }
          }
        }
      }
    }
  }
}
</style>
