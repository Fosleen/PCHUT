import { createRouter, createWebHistory } from "vue-router";
import LoginPage from "../views/LoginPage.vue";
import RegisterPage from "../views/RegisterPage.vue";
import ShoppingCartItem from "../components/ShoppingCartItem.vue";
import AuthLayout from "../components/AuthLayout.vue";
import PCBuilderComponentCard from "../components/PCBuilderComponentCard.vue";
import ProductDetailsPage from "../views/ProductDetailsPage.vue";
import PaymentDetailsPage from "../views/PaymentDetailsPage.vue";
import Homepage from "../views/Homepage.vue";
import Contact from "../views/Contact.vue";
import AllProducts from "../views/AllProducts.vue";
import MyCartPage from "../views/MyCartPage.vue";
import ProductImagesComponent from "../components/ProductImagesCarousel.vue";
import MyOrdersPage from "../views/MyOrdersPage.vue";
import PCBuilder from "../views/PCBuilder.vue";

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
    name: "PaymentDetails",
    component: PaymentDetailsPage,
  },
  {
    path: "/narudzbe",
    name: "MyOrders",
    component: MyOrdersPage,
  },
  {
    path: "/kosarica",
    name: "ShoppingCartPage",
    component: MyCartPage,
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

export default router;
