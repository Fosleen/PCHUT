<template>
  <div class="orders-wrapper">
    <div class="orders-container">
      <div class="past-orders-wrapper">
        <h3>Povijest naručivanja</h3>
        <div
          v-for="order in orders"
          v-bind:key="order.id"
          class="past-orders-container"
        >
          <OrdersListItem
            :order="{
              id: order.id,
              total: calculateTotalPrice(order),
              quantity: calculateTotalQuantity(order),
              shipping: order.delivery_status,
              payment: order.payment,
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
import { computed } from "vue";
import { useStore } from "vuex";

const store = useStore();
store.dispatch("getOrdersByUser", {
  id: 1, // TODO current user ID
});
const orders = computed(() => store.state.user.orders);

const calculateTotalQuantity = (order) => {
  let totalQuantity = 0;
  order.component.forEach((component) => {
    totalQuantity += component.pivot.quantity;
  });
  return totalQuantity;
};

const calculateTotalPrice = (order) => {
  let totalPrice = 0;
  order.component.forEach((component) => {
    totalPrice += component.pivot.quantity * component.price;
  });
  return totalPrice;
};
</script>

<style lang="scss">
@import "../utils/theme.scss";

.orders-wrapper {
  .orders-container {
    display: flex;
    flex-direction: column;
    max-width: 1200px;

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
      .past-orders-wrapper {
        box-shadow: 0 0 8px rgba(0, 0, 0, 0.25);
        margin: 12px 24px;
        height: fit-content;
      }

      .current-order-wrapper {
        padding: 0px;
        gap: 0px;

        .current-order-items-wrapper {
          box-shadow: 0 0 8px rgba(0, 0, 0, 0.25);
          margin: 12px 24px;
          padding: 20px;
        }

        .current-order-details-wrapper {
          box-shadow: 0 0 8px rgba(0, 0, 0, 0.25);
          margin: 12px 24px 24px;
          padding: 20px;

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

@media screen and ($desktop) {
  .orders-wrapper {
    .orders-container {
      flex-direction: row;
      margin: 16px auto;
      gap: 20px;

      .past-orders-wrapper {
        flex: 3;
        margin: 0;
      }

      .current-order-wrapper {
        flex: 7;
        gap: 20px;

        .current-order-items-wrapper {
          margin: 0;
        }

        .current-order-details-wrapper {
          margin: 0;
        }
      }
    }
  }
}
</style>
