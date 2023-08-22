import { createRouter, createWebHistory } from "vue-router";
import LoginPage from "../views/LoginPage.vue";
import RegisterPage from "../views/RegisterPage.vue";
import ShoppingCartItem from "../components/ShoppingCartItem.vue";
import AuthLayout from "../components/AuthLayout.vue";
import PCBuilderComponentCard from "../components/PCBuilderComponentCard.vue";
import Dashboard from "../views/Dashboard.vue";
import BuildPCButton from "../components/BuildPCButton.vue";
import Homepage from "../views/Homepage.vue";

const routes = [
  {
    path: "/",
    name: "HomePage",
    // component: PCBuilderComponentCard,
    // props: {
    //   Image:
    //     "https://www.trustedreviews.com/wp-content/uploads/sites/54/2021/03/Intel-Rocker-Lake-2-e1615908186584.jpg",
    //   className: "pc-builder-component-small-card-wrapper",
    // },
    component: Homepage,
  },
  {
    path: "/cart",
    name: "Cart",
    component: ShoppingCartItem,
    props: {
      item: {
        manufacturer: "Gigabyte",
        model:
          "GeForce GTX 1080 GeForce GTX 1080 GeForce GTX 1080 GeForce GTX 1080",
        memory: "32 GB",
        price: "1499.99",
        img: "https://www.pngmart.com/files/7/Graphics-Card-Transparent-Background.png",
      },
    },
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
  {
    path: "/build-pc",
    name: "BuildPcPage",
    component: Dashboard,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
