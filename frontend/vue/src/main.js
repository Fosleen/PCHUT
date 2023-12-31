import { createApp } from "vue";
import store from "./store";
import App from "./App.vue";
import router from "./router";
import "./style.scss";
import VueCreditCardValidation from "vue-credit-card-validation";
import Toast, { POSITION } from "vue-toastification";
import "vue-toastification/dist/index.css";

createApp(App)
  .use(store)
  .use(router)
  .use(VueCreditCardValidation)
  .use(Toast, { position: POSITION.BOTTOM_RIGHT })
  .mount("#app");
