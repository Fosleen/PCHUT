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
                src="https://www.creditcardvergelijking.nl/images/product/revolut-card.png"
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
      <button type="button" form="delivery-data" @click="logValues">
        Click without validation
      </button>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import InputField from "../components/InputField.vue";

const paymentType = ref("card");
const deliveryType = ref("default");

const card = {
  name: "",
  surname: "",
  number: "",
  expire_date: "",
  cvv: "",
};

const customer = {
  name: "",
  surname: "",
  address: "",
  city: "",
  postal: "",
  email: "",
};

const loggedUser = {
  name: "Mirko",
  surname: "Klokanić",
  address: "Ulica Netkog Nečijeg 28b",
  city: "Karlovac",
  postal: "47000",
  email: "mirko.klokanic@gmail.com",
};

function logValues() {
  console.log(paymentType.value == "card" ? card : "cod");
  console.log(deliveryType.value == "default" ? loggedUser : customer);
}
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
  background-color: $colorBgPrimary;

  .payment-details-inner {
    max-width: 1200px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 16px;
    align-items: center;

    .payment-details-card-details {
      background-color: $white-dark;
      box-shadow: 0 0 16px 4px #dbc9f3;
      width: 98%;
      padding: 32px 12px;
      border-radius: 20px;

      .payment-details-payment-type-container {
        flex-direction: row;
        width: 100%;
        display: flex;
        justify-content: space-between;
        margin: 20px 0;
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

    .payment-details-person-data {
      background-color: $white-dark;
      box-shadow: 0 0 16px 4px #dbc9f3;
      width: 98%;
      padding: 32px 12px 0;
      border-radius: 20px;

      .payment-details-delivery-data-container {
        display: flex;
        flex-direction: column;
        margin: 24px 0;
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
  }
}
</style>
