import { createApp } from "vue";
import store from "./store";
import App from "./App.vue";
import router from "./router";
import "./style.scss";
import VueCreditCardValidation from "vue-credit-card-validation";

createApp(App)
  .use(store)
  .use(router)
  .use(VueCreditCardValidation)
  .mount("#app");
