<template>
  <div class="payment-details-wrapper">
    <div class="payment-details-inner">
      <div class="payment-details-card-details">
        <h2>Posljednji korak!</h2>
        <p>Odaberite način plaćanja i unesite podatke</p>
        <div class="payment-details-payment-type-container">
          <div class="payment-details-payment-type-item">
            <input type="radio" value="card" v-model="paymentType" />
            <img src="../assets/credit-card.png" alt="recognise-card-type" />
            <p>Kartica</p>
          </div>
          <div class="payment-details-payment-type-item">
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
              <InputField placeholder="Ime *" />
              <InputField placeholder="Prezime *" />
            </div>
          </div>
          <div class="payment-details-payment-card-details-item">
            <p>Broj kartice</p>
            <div
              class="payment-details-payment-card-details-row"
              @click="setPaymentType(card)"
            >
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
            <div
              class="payment-details-payment-card-detail"
              @click="setPaymentType(cod)"
            >
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
      <div class="payment-details-person-data"></div>
      <button @click="logValues">Click</button>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import VueCreditCardValidation from "vue-credit-card-validation";
import InputField from "../components/InputField.vue";

const paymentType = ref("");
const card = {
  number: "",
  expire_date: "",
  cvv: "",
};

function logValues() {
  console.log(paymentType.value);
  console.log(card);
}
</script>

<style lang="scss">
@import "../utils/theme.scss";

.payment-details-wrapper {
  background-color: $colorBgPrimary;

  .payment-details-inner {
    max-width: 1200px;
    display: flex;
    flex-direction: column;
    justify-content: center;
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

        .payment-details-payment-type-item {
          flex-direction: row;
          display: flex;
          width: 48%;
          gap: 6px;
          padding: 8px;
          align-items: center;
          border: 2px solid #d6d6d6;
          border-radius: 16px;

          img {
            max-width: 40px;
          }

          p:nth-child(2) {
            font-size: 12px;
          }
        }
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
  }

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
}
</style>
