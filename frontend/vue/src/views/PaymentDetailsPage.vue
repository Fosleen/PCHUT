<template>
  <div class="payment-details-wrapper">
    <div class="payment-details-inner">
      <div class="payment-details-card-details">
        <h2>Posljednji korak!</h2>
        <p>Odaberite način plaćanja i unesite podatke</p>
        <div class="payment-details-payment-type-container">
          <div class="payment-details-item">
            <input type="radio" value="card" v-model="paymentType" />
            <img src="../assets/credit-card.png" alt="recognise-card-type" />
            <p>Kartica</p>
          </div>
          <div class="payment-details-item">
            <input type="radio" value="cod" v-model="paymentType" />
            <img src="../assets/cod.png" alt="recognise-card-type" />
            <div>
              <p>Pouzećem</p>
              <p>(+2 €)</p>
            </div>
          </div>
        </div>
        <div
          v-if="paymentType == 'card'"
          class="payment-details-payment-card-details"
        >
          <div class="payment-details-payment-card-details-item">
            <p>Podaci o vlasniku</p>
            <div class="payment-details-payment-card-details-row">
              <InputField
                placeholder="Ime *"
                @update:inputValue="card.name = $event"
              />
              <InputField
                placeholder="Prezime *"
                @update:inputValue="card.surname = $event"
              />
            </div>
          </div>
          <div class="payment-details-payment-card-details-item">
            <p>Broj kartice</p>
            <div class="payment-details-payment-card-details-row">
              <InputField
                placeholder="4512 4514 2224 4444 *"
                class="form-control"
                v-cardformat:formatCardNumber
                @update:inputValue="card.number = $event"
              />
              <img
                src="https://images.contentstack.io/v3/assets/bltc05b5aa7ae1c3a47/blta54a2e549cacf89a/64abc3a08f332a057d544fe3/Standard_v3xxhdpi.png"
                alt="recognise-card-type"
              />
            </div>
          </div>
          <div class="payment-details-payment-card-details-row">
            <div class="payment-details-payment-card-detail">
              <p>Istek kartice</p>
              <InputField
                placeholder="01/23 *"
                v-cardformat:formatCardExpiry
                @update:inputValue="card.expire_date = $event"
              />
            </div>
            <div class="payment-details-payment-card-detail">
              <p>CVV</p>
              <InputField
                placeholder="123 *"
                type="number"
                maxlength="3"
                v-cardformat:formatCardCVC
                @update:inputValue="card.cvv = $event"
              />
            </div>
          </div>
        </div>
      </div>
      <div class="payment-details-person-price-wrapper">
        <div class="payment-details-person-data">
          <h2>Podaci o naručitelju</h2>
          <p>Unesite podatke dostave</p>
          <div class="payment-details-delivery-data-container">
            <div class="payment-details-delivery-data-row">
              <div class="payment-details-item">
                <input type="radio" value="default" v-model="deliveryType" />
                <span></span>
                <p>Podaci profila</p>
              </div>
              <div
                class="payment-details-default-data"
                v-if="deliveryType == 'default'"
              >
                <p>{{ loggedUser.name }} {{ loggedUser.surname }}</p>
                <p>
                  {{ loggedUser.address }}, {{ loggedUser.postal }}
                  {{ loggedUser.city }}
                </p>
                <p>{{ loggedUser.email }}</p>
              </div>
            </div>
            <div class="payment-details-item">
              <input type="radio" value="custom" v-model="deliveryType" />
              <span></span>
              <p>Drugačiji podaci</p>
            </div>
            <form
              id="delivery-data"
              v-if="deliveryType == 'custom'"
              class="payment-details-custom-data"
            >
              <p>Ime naručitelja:</p>
              <InputField
                placeholder="Ime *"
                @update:inputValue="customer.name = $event"
              />
              <p>Prezime naručitelja:</p>
              <InputField
                placeholder="Prezime *"
                @update:inputValue="customer.surname = $event"
              />
              <p>Email naručitelja:</p>
              <InputField
                placeholder="email@email.com *"
                @update:inputValue="customer.email = $event"
                type="email"
              />
              <p>Adresa dostave:</p>
              <InputField
                placeholder="Ulica Slavka Horvata 123a *"
                @update:inputValue="customer.address = $event"
              />
              <p>Poštanski broj:</p>
              <InputField
                placeholder="10000 *"
                @update:inputValue="customer.postal = $event"
                type="number"
              />
              <p>Grad:</p>
              <InputField
                placeholder="Zagreb *"
                @update:inputValue="customer.city = $event"
              />
            </form>
          </div>
        </div>
        <div class="payment-details-price-wrapper">
          <FinalPriceAndButton
            @click="createOrder"
            priceLabel="Ukupan iznos narudžbe:"
            :price="totalPrice"
            buttonText="Završi i plati"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, computed } from "vue";
import InputField from "../components/InputField.vue";
import FinalPriceAndButton from "../components/FinalPriceAndButton.vue";
import axiosClient from "../axios";
import store from "../store";
import { getLoggedUser } from "../api/api";
import router from "../router";

const cartItemsId = ref([]);
const cartItemsQuantity = ref([]);

const paymentType = ref("card");
const deliveryType = ref("default");
const totalPrice = computed(() => store.state.user.cart.totalPrice.toFixed(2));

const card = {
  name: "",
  surname: "",
  number: "",
  expire_date: "",
  cvv: "",
};

const customer = ref({
  name: "",
  surname: "",
  address: "",
  city: "",
  postal: "",
  email: "",
});

const loggedUser = ref({
  id: "",
  name: "",
  surname: "",
  address: "",
  city: "",
  postal: "",
  email: "",
});

const createOrder = async () => {
  try {
    console.log(loggedUser.value.id);

    await axiosClient
      .post("/order", {
        user_id: loggedUser.value.id,
        component_id: cartItemsId.value,
        quantity: cartItemsQuantity.value,
        payment: paymentType.value == "card" ? 1 : 0,
        delivery_status: 0,
        order_name:
          deliveryType.value == "default"
            ? loggedUser.value.name + " " + loggedUser.value.surname
            : customer.value.name + " " + customer.value.surname,
        order_address:
          deliveryType.value == "default"
            ? loggedUser.value.address +
              ", " +
              loggedUser.value.postal +
              " " +
              loggedUser.value.city
            : customer.value.address +
              ", " +
              customer.value.postal +
              " " +
              customer.value.city,
      })
      .then(({ data }) => {
        console.log(data);
        sessionStorage.setItem("cart", []);
        router.push("/narudzbe");
      });
  } catch (err) {
    console.log("Error - " + err);
  }
};

const fetchCartItemsData = async () => {
  try {
    for (const el of JSON.parse(sessionStorage.getItem("cart"))) {
      cartItemsId.value.push(el.id);
      cartItemsQuantity.value.push(el.quantity);
    }
  } catch (err) {
    console.log("Error - " + err);
  }
};

onMounted(async () => {
  await fetchCartItemsData();

  try {
    const user = await getLoggedUser();
    console.log(user);

    loggedUser.value = user;
  } catch (err) {
    console.error("Error fetching user data:", err);
  }
});
</script>

<style lang="scss">
@import "../utils/theme.scss";

h2 {
  color: $grey-dark;
}

p {
  color: $grey-dark;
  font-size: 16px;
}

input {
  width: 100%;
}
.payment-details-wrapper {
  justify-content: center;

  .payment-details-inner {
    max-width: 1200px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 32px;
    align-items: center;

    .payment-details-card-details {
      background-color: $white-dark;
      box-shadow: 0 0 16px 4px #dbc9f3;
      width: 100%;
      padding: 32px 12px;
      border-radius: 20px;

      .payment-details-payment-type-container {
        flex-direction: row;
        width: 100%;
        display: flex;
        gap: 16px;
        justify-content: center;
        margin: 20px auto;
      }

      .payment-details-payment-card-details {
        display: flex;
        flex-direction: column;
        gap: 16px;

        p {
          margin-bottom: 8px;
        }

        .payment-details-payment-card-details-row {
          width: 100%;
          display: flex;
          gap: 10px;

          img {
            max-width: 60px;
          }

          .payment-details-payment-card-detail-item {
            display: flex;
            flex-direction: row;

            .payment-details-payment-card-detail {
              width: 50%;
              display: flex;
              flex-direction: column;
            }
          }
        }
      }
    }

    .payment-details-person-price-wrapper {
      border-radius: 20px;
      background-color: $white-dark;
      position: relative;
      margin-bottom: 150px;
      width: 100%;

      .payment-details-person-data {
        box-shadow: 0 0 16px 4px #dbc9f3;
        padding: 32px 12px 0;
        border-radius: 20px;

        .payment-details-delivery-data-container {
          display: flex;
          flex-direction: column;
          padding: 24px 0;
          gap: 8px;

          .payment-details-delivery-data-row {
            display: flex;
            gap: 8px;

            .payment-details-default-data {
              p {
                font-size: 14px;
              }
            }
          }

          .payment-details-custom-data {
            display: flex;
            flex-direction: column;
            gap: 8px;
            padding: 16px 0;
          }
        }
      }

      .payment-details-price-wrapper {
        position: absolute;
        bottom: -120px;
        width: 100%;
      }
    }

    .payment-details-item {
      flex-direction: row;
      display: flex;
      width: fit-content;
      gap: 6px;
      padding: 8px;
      align-items: center;
      border: 2px solid #d6d6d6;
      border-radius: 16px;
      min-height: 48px;
      white-space: pre;

      img {
        max-width: 40px;
      }

      p:nth-child(2) {
        font-size: 12px;
      }
    }
  }
}

@media screen and ($tablet) {
  p {
    color: $grey-dark;
    font-size: 20px;
  }

  .payment-details-wrapper {
    width: 90%;
    margin: 10px auto;

    .payment-details-inner {
      .payment-details-card-details {
        padding: 48px;

        .payment-details-payment-type-container {
          justify-content: start;
        }
      }

      .payment-details-person-price-wrapper {
        .payment-details-person-data {
          padding: 48px;
        }
      }
    }
  }
}
@media screen and ($desktop) {
  .payment-details-wrapper {
    /* height: 70vh; */
    align-items: center;
    display: flex;

    .payment-details-inner {
      flex-direction: row;
      align-items: start;

      .payment-details-card-details {
        height: 500px;
        width: 450px;
      }

      .payment-details-person-data {
        min-height: 420px;
      }
      .payment-details-person-price-wrapper {
        width: 450px;

        .payment-details-price-wrapper {
          position: absolute;
          bottom: -80px;
          width: 100%;
        }
      }
    }
  }
}
</style>
