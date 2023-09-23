<template>
  <div class="page-tracker-wrapper">
    <h1 v-if="location == 'HomePage'" class="page-tracker-text">
      >> HOMEPAGE {{ text }}
    </h1>

    <h1 v-if="location == 'ProductDetails'" class="page-tracker-text">
      >> HOMEPAGE >> {{ text }}
    </h1>

    <h1 v-if="location == 'ShoppingCartPage'" class="page-tracker-text">
      >> Pregled košarice {{ text }}
    </h1>

    <h1 v-if="location == 'PaymentDetails'" class="page-tracker-text">
      >> Pregled košarice >> Plaćanje {{ text }}
    </h1>

    <h1 v-if="location == 'MyOrders'" class="page-tracker-text">
      >> Profil >> Moje narudžbe {{ text }}
    </h1>

    <h1 v-if="location == 'PCBuilderPage'" class="page-tracker-text">
      >> Homepage >> Izradi svoj PC {{ text }}
    </h1>

    <h1 v-if="location == 'ProductsPage'" class="page-tracker-text">
      >> Svi proizvodi {{ text }}
    </h1>

    <h1 v-if="location == 'ContactPage'" class="page-tracker-text">
      >> Kontakt {{ text }}
    </h1>

    <h1 v-if="location == 'ProfilePage'" class="page-tracker-text">
      >> Profil {{ text }}
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
.page-tracker-wrapper {
  display: flex;
  gap: 4px;
  margin-top: 24px;
  margin-bottom: 24px;
}
.page-tracker-text {
  text-transform: uppercase;
  //text-decoration: underline;
}
</style>
