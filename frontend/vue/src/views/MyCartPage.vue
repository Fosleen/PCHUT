<template>
  <div class="my-cart-wrapper">
    <Modal
      ref="modalComponentRef"
      text="Jeste li sigurni da želite ukloniti proizvod iz košarice?"
      @cancel-click="onCancelClick"
      @confirm-click="onConfirmClick"
    />
    <div class="my-cart-container">
      <div class="my-cart-items-container">
        <PageTracker />

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
            v-for="item in cartItems"
            v-bind:key="item"
            :item="{
              manufacturer: item.manufacturer.name,
              model: item.model,
              memory: item.memory,
              price: item.price,
              quantity: item.currQuantity,
              product_type_cro: item.product_type_cro,
              img:
                item.images && item.images.length > 0
                  ? item.images[0]
                  : 'https://www.mobismea.com/upload/iblock/2a0/2f5hleoupzrnz9o3b8elnbv82hxfh4ld/No%20Product%20Image%20Available.png',
            }"
            @change-quantity="change(item.id, item.price, $event)"
            @remove-product="removeProduct(item.id)"
          />
        </div>
        <span v-if="!cartLoaded"><LoaderCartItem /></span>

        <Message
          v-if="cartItems.length === 0 && cartLoaded"
          text="Još nemate proizvoda u košarici."
          imageName="empty-cart"
        />
        <div
          class="my-cart-items-total-price-wrapper"
          v-if="cartItems.length > 0"
        >
          <div class="my-cart-items-total-price">
            <p>{{ totalPrice.toFixed(2) }} €</p>
          </div>
        </div>
      </div>
      <div class="my-cart-details-container" v-if="cartItems.length > 0">
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
              <p>{{ result }}</p>
            </div>
          </div>
          <div class="my-cart-details-details-data-prices">
            <div class="my-cart-details-details-data-prices-row">
              <p>Osnovica:</p>
              <p>{{ (totalPrice * 0.75).toFixed(2) }} €</p>
            </div>
            <div class="my-cart-details-details-data-prices-row">
              <p>Porez:</p>
              <p>{{ (totalPrice * 0.25).toFixed(2) }} €</p>
            </div>
            <div class="my-cart-details-details-data-prices-row">
              <p>Dostava:</p>
              <p>0 €</p>
            </div>
            <div class="my-cart-details-details-data-prices-row">
              <p>Ukupan iznos košarice:</p>
              <p>{{ totalPrice.toFixed(2) }} €</p>
            </div>
          </div>
        </div>
      </div>
      <div class="my-cart-continue" v-if="cartItems.length > 0">
        <router-link to="/detalji-placanja">
          <Button shape="trapezoid" text="Nastavi na plaćanje" />
        </router-link>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import Button from "../components/Button.vue";
import Message from "../components/Message.vue";
import Modal from "../components/Modal.vue";
import ShoppingCartItem from "../components/ShoppingCartItem.vue";
import { PhCalendarCheck } from "@phosphor-icons/vue";
import { getComponentById } from "../api/api";
import LoaderCartItem from "../components/LoaderCartItem.vue";
import store from "../store";
import PageTracker from "../components/PageTracker.vue";

const deliveryType = ref("home-delivery");
const cartItems = ref([]);
const totalPrice = ref(0);
const selectedItemId = ref(0);
const modalComponentRef = ref(null);
const cartLoaded = ref(false);

store.watch(
  () => store.state.user.cart,
  (newItems) => {
    //console.log(newItems);

    cartItems.value = newItems;
    cartLoaded.value = true;
  }
);

function onCancelClick() {
  cartLoaded.value = false;
  const savedCart = JSON.parse(sessionStorage.getItem("cart"));
  savedCart.forEach((element) => {
    if (element.id == selectedItemId.value) {
      element.quantity = 1;
    }
    sessionStorage.setItem("cart", JSON.stringify(savedCart));
    cartItems.value = savedCart;
  });
  modalComponentRef.value.close();
  fetchCartItemsData();
}

function onConfirmClick() {
  cartLoaded.value = false;
  const oldCart = JSON.parse(sessionStorage.getItem("cart"));
  const updatedCart = oldCart.filter((el) => el.id !== selectedItemId.value);
  sessionStorage.setItem("cart", JSON.stringify(updatedCart));
  fetchCartItemsData(); // TODO can it be done without this?
}

const options = { day: "numeric", month: "long" };
const today = new Date();
const threeDaysLater = new Date();
threeDaysLater.setDate(today.getDate() + 3);

const formattedToday = today.toLocaleDateString("hr-HR", options);
const formattedThreeDaysLater = threeDaysLater.toLocaleDateString(
  "hr-HR",
  options
);

const result = `${formattedToday} - ${formattedThreeDaysLater}`;

function removeProduct(id) {
  selectedItemId.value = id;
  onConfirmClick();
}

function change(id, price, newQuantity) {
  const savedCart = JSON.parse(sessionStorage.getItem("cart"));

  savedCart.forEach((element) => {
    if (element.id == id) {
      newQuantity > element.quantity
        ? (totalPrice.value += price)
        : (totalPrice.value -= price);

      element.quantity = newQuantity;

      if (element.quantity == 0) {
        selectedItemId.value = element.id;
        modalComponentRef.value.show(element.id);
      }
    }
    sessionStorage.setItem("cart", JSON.stringify(savedCart));
  });

  store.dispatch("totalCartPrice", totalPrice.value);
}

const fetchCartItemsData = async () => {
  cartItems.value = [];
  totalPrice.value = 0;
  try {
    for (const el of JSON.parse(sessionStorage.getItem("cart"))) {
      // this kind of loop is for async calls
      const response = await getComponentById(el.id);
      response.data.currQuantity = el.quantity;
      cartItems.value.push(response.data);
      totalPrice.value += response.data.price * el.quantity;
    }
  } catch (err) {
    // console.log("Error - " + err);
  }
  //console.log(JSON.parse(JSON.stringify(cartItems.value)));

  store.dispatch("totalCartPrice", totalPrice.value);
  cartLoaded.value = true;
};

onMounted(async () => {
  await fetchCartItemsData();
});
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
