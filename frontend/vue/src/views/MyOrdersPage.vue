<template>
  <div>
    <div class="my-orders-page-tracker-wrapper">
      <PageTracker />
    </div>
    <div class="orders-wrapper" v-if="orders.length > 0">
      <img class="img-background" src="../assets/gpu-grey.png" alt="" />
      <img class="img-background" src="../assets/cpu-grey.png" alt="" />
      <div class="orders-container">
        <div class="past-orders-wrapper">
          <h3>Povijest naručivanja</h3>
          <div class="past-orders-container">
            <OrdersListItem
              v-for="order in orders"
              v-bind:key="order.id"
              @click="changeSelectedOrder(order)"
              :order="{
                id: order.id,
                total: calculateTotalPrice(order),
                quantity: calculateTotalQuantity(order),
                shipping: order.delivery_status,
                payment: recalculatePayment(order),
              }"
            />
          </div>
        </div>
        <div v-if="selectedOrder" class="current-order-wrapper">
          <div class="current-order-items-wrapper">
            <div class="current-order-items-title">
              <h2>#{{ selectedOrder.id }}</h2>
              <p>({{ calculateTotalQuantity(selectedOrder) }})</p>
            </div>
            <div class="current-order-items-container">
              <OrderItem
                v-for="component in selectedOrder.components"
                v-bind:key="component.id"
                :item="{
                  img: component.images,
                  manufacturer: component.manufacturer,
                  model: component.model,
                  price: component.price,
                  type: component.product_type_cro,
                  quantity: component.quantity,
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
                <p>{{ selectedOrder.order_name }}</p>
              </div>
              <div>
                <p>Adresa:</p>
                <p>{{ selectedOrder.order_address }}</p>
              </div>
              <div>
                <p>Način plaćanja:</p>
                <p>{{ recalculatePayment(selectedOrder) }}</p>
              </div>
              <div>
                <p>Status dostave:</p>
                <p>{{ recalculateDeliveryStatus(selectedOrder) }}</p>
              </div>
              <div>
                <p>Očekivan datum dostave:</p>
                <p>15. kolovoz - 17. kolovoz 2023.</p>
              </div>
              <div>
                <p>Ukupno:</p>
                <p>{{ calculateTotalPrice(selectedOrder) }} €</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="message" v-else>
      <Message text="Još nemate prethodnih narudžbi." imageName="empty-order" />
    </div>
  </div>
</template>

<script setup>
import OrderItem from "../components/OrderItem.vue";
import OrdersListItem from "../components/OrdersListItem.vue";
import Message from "../components/Message.vue";
import { computed, ref } from "vue";
import { useStore } from "vuex";
import PageTracker from "../components/PageTracker.vue";
const store = useStore();

store.dispatch("getOrdersByUser", {
  id: store.state.user.data.id,
});
const orders = computed(() => store.state.user.orders);
const selectedOrder = ref(null);

const calculateTotalQuantity = (order) => {
  let totalQuantity = 0;
  order.components.forEach((component) => {
    totalQuantity += component.quantity;
  });
  return totalQuantity;
};

const calculateTotalPrice = (order) => {
  let totalPrice = 0;
  order.components.forEach((component) => {
    totalPrice += component.quantity * component.price;
  });
  return totalPrice;
};

const changeSelectedOrder = (order) => {
  selectedOrder.value = order;
  console.log(selectedOrder.value);
};

const recalculatePayment = (order) => {
  if (order.payment == 0) {
    return "Plaćanje pouzećem";
  } else if (order.payment == 1) {
    return "Plaćeno";
  }
};

const recalculateDeliveryStatus = (order) => {
  if (order.delivery_status == 0) {
    return "Obrada narudžbe";
  } else if (order.delivery_status == 1) {
    return "U dostavi";
  } else {
    return "Dostavljeno";
  }
};
</script>

<style lang="scss">
@import "../utils/theme.scss";

.message {
  margin: 24px 0;
}

.orders-wrapper {
  position: relative;
  min-height: calc(100vh - 92px);

  .img-background {
    display: none;
  }

  .orders-container {
    display: flex;
    flex-direction: column;
    max-width: 1200px;
    z-index: 1;
    position: relative;

    h2 {
      font-size: 20px;
    }

    .past-orders-wrapper {
      padding: 20px;
      background-color: $colorBgPrimary;

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

      .current-order-items-wrapper {
        background-color: $colorBgPrimary;
      }

      .current-order-items-title {
        display: flex;
        gap: 4px;
        align-items: center;

        p {
          font-size: 12px;
        }
      }

      .current-order-details-wrapper {
        background-color: $colorBgPrimary;

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
              border-top: 1px solid $grey-light;
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
    .img-background {
      position: absolute;
      display: block;

      &:first-of-type {
        top: 30px;
        right: 0;
        transform: rotate(25deg);
        width: 270px;
        z-index: 0;
        scale: 1.2;
      }

      &:last-of-type {
        top: 70%;
        left: -20px;
        scale: 1.5;
        transform: rotate(25deg);
        width: 270px;
        z-index: 0;
      }
    }

    .orders-container {
      flex-direction: row;
      margin: 16px auto;
      gap: 20px;

      .past-orders-wrapper {
        width: calc(30% - 20px);
        margin: 0;
        z-index: 1;
        position: relative;
      }

      .current-order-wrapper {
        width: 70%;
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

.my-orders-page-tracker-wrapper {
  display: flex;
  max-width: 1200px;
  position: relative;
  margin: 16px auto;
}
</style>
