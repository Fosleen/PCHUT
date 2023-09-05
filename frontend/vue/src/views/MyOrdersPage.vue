<template>
  <div class="orders-wrapper">
    <div class="orders-container">
      <div class="past-orders-wrapper">
        <h3>Povijest naručivanja</h3>
        <div class="past-orders-container">
          <OrdersListItem
            :order="{
              id: 1,
              total: 2541.99,
              quantity: 4,
              shipping: 1,
              payment: 1,
            }"
          />
          <OrdersListItem
            :order="{
              id: 2,
              total: 784.99,
              quantity: 2,
              shipping: 0,
              payment: 0,
            }"
          />
          <OrdersListItem
            :order="{
              id: 3,
              total: 541.45,
              quantity: 1,
              shipping: 2,
              payment: 1,
            }"
          />
        </div>
      </div>
      <div class="current-order-wrapper">
        <div class="current-order-items-wrapper">
          <div class="current-order-items-title">
            <h2>Narudžba #38929</h2>
            <p>(4)</p>
          </div>
          <div class="current-order-items-container">
            <OrderItem
              :item="{
                img: 'https://www.pngmart.com/files/7/Graphics-Card-PNG-Transparent-HD-Photo.png',
                manufacturer: 'Intel',
                model: 'Ultra Smart Reedranioc 7800XD',
                price: 250,
                type: 'Grafička kartica',
                quantity: 3,
              }"
            />
            <OrderItem
              :item="{
                img: 'https://www.pngmart.com/files/7/Graphics-Card-PNG-Transparent-HD-Photo.png',
                manufacturer: 'Intel',
                model: 'Ultra Smart Reedranioc 7800XD',
                price: 250,
                type: 'Grafička kartica',
                quantity: 3,
              }"
            />
            <OrderItem
              :item="{
                img: 'https://www.pngmart.com/files/7/Graphics-Card-PNG-Transparent-HD-Photo.png',
                manufacturer: 'Intel',
                model: 'Ultra Smart Reedranioc 7800XD',
                price: 250,
                type: 'Grafička kartica',
                quantity: 3,
              }"
            />
          </div>
        </div>
        <div class="current-order-details-wrapper">
          <div class="current-order-details-title">
            <h2>Detalji</h2>
          </div>
          <div class="current-order-details-container">
            <div>
              <p>Ime i prezime:</p>
              <p>Ivan Horvat</p>
            </div>
            <div>
              <p>Adresa:</p>
              <p>Ul. kneza Branimira 451, Slavonski Brod, 35000, Hrvatska</p>
            </div>
            <div>
              <p>Način plaćanja:</p>
              <p>Plaćeno online</p>
            </div>
            <div>
              <p>Status dostave:</p>
              <p>U dostavi</p>
            </div>
            <div>
              <p>Očekivan datum dostave:</p>
              <p>15. kolovoz - 17. kolovoz 2023.</p>
            </div>

            <div>
              <p>Ukupno:</p>
              <p>2541,88 €</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import OrderItem from "../components/OrderItem.vue";
import OrdersListItem from "../components/OrdersListItem.vue";
</script>

<style lang="scss">
@import "../utils/theme.scss";

.orders-wrapper {
  max-width: 1200px;

  .orders-container {
    display: flex;
    flex-direction: column;
    box-shadow: 0 0 8px rgba(0, 0, 0, 0.25);

    h2 {
      font-size: 20px;
    }

    .past-orders-wrapper {
      padding: 20px;

      h3 {
        font-weight: 400;
        font-size: 18px;
        margin-bottom: 16px;
      }

      .past-orders-container {
        display: flex;
        flex-direction: column;
        align-items: center;
      }
    }

    .current-order-wrapper {
      display: flex;
      flex-direction: column;
      gap: 16px;
      padding: 20px;

      .current-order-items-title {
        display: flex;
        gap: 4px;
        align-items: center;

        p {
          font-size: 12px;
        }
      }

      .current-order-details-wrapper {
        .current-order-details-container {
          display: flex;
          gap: 8px;
          flex-direction: column;
          padding-top: 12px;

          & > div {
            display: flex;
            flex-direction: column;
            justify-content: space-between;

            p {
              font-size: 18px;
              word-wrap: break-word;
              font-weight: 500;

              &:last-child {
                font-weight: 600;
              }
            }

            & > p:first-child {
              color: $colorTextTertiary;
            }

            &:last-child {
              border-top: 2px solid $grey-light;
              margin-top: 8px;
              padding-top: 8px;
              flex-direction: row;
              align-items: center;

              & > p:last-child {
                font-size: 20px;
                font-weight: 800;
              }
            }
          }
        }
      }
    }
  }
}

@media screen and ($tablet) {
  .orders-wrapper {
    .orders-container {
      .current-order-wrapper {
        .current-order-details-wrapper {
          .current-order-details-container {
            & > div {
              flex-direction: row;
              align-items: center;

              & > p:last-child {
                text-align: right;
              }
            }
          }
        }
      }
    }
  }
}
</style>
