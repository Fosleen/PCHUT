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
        <div class="my-cart-details-delivery">
          <p>Odaberi način dostave:</p>
          <div class="delivery-type">
            <input type="radio" value="home-delivery" v-model="deliveryType" />
            <img src="../assets/home-delivery.png" alt="home-delivery" />
            <p>GLS dostava (besplatno)</p>
          </div>
          <div class="delivery-type">
            <input type="radio" value="personal" v-model="deliveryType" />
            <img src="../assets/delivery.png" alt="personal" />
            <p>Osobno preuzimanje</p>
          </div>
        </div>
        <div class="my-cart-details-promo-code">
          <p>Unesi promo kod:</p>
          <input type="text" />
        </div>
        <div class="my-cart-details-data">
          <div class="my-cart-details-data-delivery-date">
            <p>Očekivana isporuka:</p>
            <div>
              <PhCalendarCheck />
              <p>25. kolovoz - 28. kolovoz</p>
            </div>
          </div>
          <div class="my-cart-details-details-data-prices">
            <div class="my-cart-details-details-data-prices-row">
              <p>Osnovica:</p>
              <p>6076,26 €</p>
            </div>
            <div class="my-cart-details-details-data-prices-row">
              <p>Porez:</p>
              <p>2025,42 €</p>
            </div>
            <div class="my-cart-details-details-data-prices-row">
              <p>Dostava:</p>
              <p>0 €</p>
            </div>
            <div class="my-cart-details-details-data-prices-row">
              <p>Ukupan iznos košarice:</p>
              <p>8010.65 €</p>
            </div>
          </div>
        </div>
      </div>
      <div class="my-cart-continue">
        <router-link to="/detalji-placanja">
          <Button shape="trapezoid" text="Nastavi na plaćanje" />
        </router-link>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import Button from "../components/Button.vue";
import ShoppingCartItem from "../components/ShoppingCartItem.vue";
import { PhCalendarCheck } from "@phosphor-icons/vue";

const deliveryType = ref("home-delivery");
</script>

<style lang="scss">
@import "../utils/theme.scss";

.my-cart-wrapper {
  padding: 32px 0;

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

    .my-cart-details-container {
      background-color: $white-dark;
      border-radius: 16px 16px 0 0;
      display: flex;
      flex-direction: column;
      gap: 32px;
      padding: 24px;
      justify-content: space-between;

      p {
        font-size: 16px;
        font-weight: 500;
      }

      p:first-child {
        font-size: 20px;
      }

      .my-cart-details-delivery {
        display: flex;
        flex-direction: column;
        gap: 8px;

        .delivery-type {
          flex-direction: row;
          display: flex;
          width: fit-content;
          gap: 6px;
          padding: 8px;
          align-items: center;
          border: 2px solid #d9d9d9;
          border-radius: 16px;
          min-height: 48px;
          white-space: pre;

          img {
            max-width: 40px;
          }
        }
      }

      .my-cart-details-promo-code {
        display: flex;
        flex-direction: column;
        gap: 8px;

        input {
          border: none;
          background-color: $white-dark;
          border-bottom: 2px solid $colorTextPrimary;
          border-radius: 0;
        }
      }

      .my-cart-details-data {
        .my-cart-details-data-delivery-date {
          background-color: $grey-light;
          border-radius: 100px;
          text-align: center;
          display: flex;
          flex-direction: column;
          align-items: center;
          padding: 12px;
          gap: 4px;

          > div {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 24px;
          }
        }
        .my-cart-details-details-data-prices {
          display: flex;
          flex-direction: column;
          gap: 8px;
          margin-top: 24px;

          .my-cart-details-details-data-prices-row {
            p {
              font-size: 16px;
              font-weight: 600;
            }
            &:last-of-type {
              p {
                font-size: 20px;
                font-weight: 700;
              }
            }
          }
        }
      }
    }

    .my-cart-continue {
      border-top: 4px solid $colorPrimary;
      display: flex;
      justify-content: end;
    }
  }
}

@media screen and ($tablet) {
  .my-cart-wrapper {
    padding: 24px;

    .my-cart-container {
      .my-cart-details-container {
        p {
          font-size: 16px;
          font-weight: 500;
        }

        p:first-child {
          font-size: 20px;
        }

        .my-cart-details-delivery {
          flex-direction: row;
          gap: 16px;
          align-items: center;
        }

        .my-cart-details-promo-code {
          width: 300px;
        }

        .my-cart-details-data {
          flex-direction: row;
          display: flex;
          gap: 48px;

          .my-cart-details-data-delivery-date {
            width: 300px;
            height: fit-content;
          }

          .my-cart-details-details-data-prices {
            .my-cart-details-details-data-prices-row {
              p {
                font-size: 18px;
                font-weight: 500;
              }

              &:last-of-type {
                p {
                  font-size: 20px;
                  font-weight: 700;
                }
              }
            }
          }
        }
      }
    }
  }
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

      .my-cart-details-container {
        flex-direction: row;
        padding: 48px;

        .my-cart-details-delivery {
          flex-direction: column;
          align-items: start;
        }

        .my-cart-details-promo-code {
          width: 300px;
        }

        .my-cart-details-data {
          flex-direction: column;
          gap: 8px;
          justify-content: end;
          align-items: end;

          .my-cart-details-data-delivery-date {
            width: fit-content;

            > div {
              padding: 0 24px;
            }
          }

          .my-cart-details-details-data-prices {
            .my-cart-details-details-data-prices-row {
              display: grid;
              grid-template-columns: 2fr 1fr;
              gap: 8px;
              justify-content: center;

              p {
                font-size: 20px;

                &:first-of-type {
                  text-align: end;
                }
              }

              &:last-of-type {
                p {
                  font-size: 24px;
                }
              }
            }
          }
        }
      }
    }
  }
}
</style>
