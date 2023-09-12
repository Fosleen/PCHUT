import { createRouter, createWebHistory } from "vue-router";
import LoginPage from "../views/LoginPage.vue";
import RegisterPage from "../views/RegisterPage.vue";
import AuthLayout from "../components/AuthLayout.vue";
import ProductDetailsPage from "../views/ProductDetailsPage.vue";
import PaymentDetailsPage from "../views/PaymentDetailsPage.vue";
import Homepage from "../views/Homepage.vue";
import Contact from "../views/Contact.vue";
import AllProducts from "../views/AllProducts.vue";
import MyCartPage from "../views/MyCartPage.vue";
import ProfilePage from "../views/ProfilePage.vue";
import MyOrdersPage from "../views/MyOrdersPage.vue";
import PCBuilder from "../views/PCBuilder.vue";
import store from "../store";

const routes = [
  {
    path: "/",
    name: "HomePage",
    component: Homepage,
  },
  {
    path: "/kontakt",
    name: "ContactPage",
    component: Contact,
  },
  {
    path: "/proizvodi",
    name: "ProductsPage",
    component: AllProducts,
  },
  {
    path: "/:productable_type/:id",
    name: "ProductDetails",
    component: ProductDetailsPage,
  },
  {
    path: "/pc-builder",
    name: "PCBuilderPage",
    component: PCBuilder,
  },
  {
    path: "/detalji-placanja",
    meta: { requiresAuth: true },
    name: "PaymentDetails",
    component: PaymentDetailsPage,
  },
  {
    path: "/narudzbe",
    meta: { requiresAuth: true },
    name: "MyOrders",
    component: MyOrdersPage,
  },
  {
    path: "/kosarica",
    meta: { requiresAuth: true },
    name: "ShoppingCartPage",
    component: MyCartPage,
  },
  {
    path: "/profil",
    meta: { requiresAuth: true },
    name: "ProfilePage",
    component: ProfilePage,
  },
  {
    path: "/auth",
    name: "AuthLayout",
    redirect: "/login",
    component: AuthLayout,
    meta: { isGuest: true },
    children: [
      { path: "/login", name: "LoginPage", component: LoginPage },
      { path: "/register", name: "RegisterPage", component: RegisterPage },
    ],
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

router.beforeEach((to, from, next) => {
  if (to.meta.requiresAuth && !store.state.user.token) {
    console.log(store.state.user.token);
    next({ name: "LoginPage" });
  } else if (store.state.user.token && to.meta.isGuest) {
    next({ name: "ShoppingCartPage" });
  } else {
    next();
  }
});

export default router;
