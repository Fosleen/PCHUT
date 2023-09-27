<template>
  <div class="page-tracker-wrapper">
    <h1 v-if="location == 'HomePage'" class="page-tracker-text">
      <span class="right-arrow-wrapper"> &#xbb;</span> HOMEPAGE {{ text }}
    </h1>

    <h1 v-if="location == 'ProductDetails'" class="page-tracker-text">
      <span class="right-arrow-wrapper"> &#xbb;</span> HOMEPAGE
      <span class="right-arrow-wrapper"> &#xbb;</span> {{ text }}
    </h1>

    <h1 v-if="location == 'ShoppingCartPage'" class="page-tracker-text">
      <span class="right-arrow-wrapper"> &#xbb;</span> Pregled košarice
      {{ text }}
    </h1>

    <h1 v-if="location == 'PaymentDetails'" class="page-tracker-text">
      <span class="right-arrow-wrapper"> &#xbb;</span> Pregled košarice
      <span class="right-arrow-wrapper"> &#xbb;</span> Plaćanje {{ text }}
    </h1>

    <h1 v-if="location == 'MyOrders'" class="page-tracker-text">
      <span class="right-arrow-wrapper"> &#xbb;</span> Profil
      <span class="right-arrow-wrapper"> &#xbb;</span> Moje narudžbe {{ text }}
    </h1>

    <h1 v-if="location == 'PCBuilderPage'" class="page-tracker-text">
      <span class="right-arrow-wrapper"> &#xbb;</span> Homepage
      <span class="right-arrow-wrapper"> &#xbb;</span> Izradi svoj PC {{ text }}
    </h1>

    <h1 v-if="location == 'ProductsPage'" class="page-tracker-text">
      <span class="right-arrow-wrapper"> &#xbb;</span> Svi proizvodi {{ text }}
    </h1>

    <h1 v-if="location == 'ContactPage'" class="page-tracker-text">
      <span class="right-arrow-wrapper"> &#xbb;</span> Kontakt {{ text }}
    </h1>

    <h1 v-if="location == 'ProfilePage'" class="page-tracker-text">
      <span class="right-arrow-wrapper"> &#xbb;</span> Profil {{ text }}
    </h1>
  </div>
</template>

<script setup>
import { useRoute } from "vue-router";

const route = useRoute();
const location = route.name;
console.log("Lokacija je", location);

const props = defineProps({
  text: {
    type: String,
    default: undefined,
  },
});
</script>

<style lang="scss" scoped>
@import "../utils/theme.scss";

.page-tracker-wrapper {
  display: flex;
  gap: 4px;
  margin: 8px;
  color: #454545;

  @media screen and ($tablet) {
    margin-top: 24px;
    margin-bottom: 24px;
  }
}
.page-tracker-text {
  font-size: 14px;
  text-transform: uppercase;

  @media screen and ($tablet) {
    font-size: 24px;
  }
}

.right-arrow-wrapper {
  font-size: 20px;
  color: #454545;

  @media screen and ($tablet) {
    font-size: 30px;
  }
}
</style>
