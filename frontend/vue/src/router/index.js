import { createRouter, createWebHistory } from "vue-router";
import LoginPage from "../views/LoginPage.vue";
import RegisterPage from "../views/RegisterPage.vue";
import Footer from "../components/Footer.vue";
import AuthLayout from "../components/AuthLayout.vue";
import PCBuilderComponentCard from "../components/PCBuilderComponentCard.vue";
import Searchbar from "../components/Searchbar.vue";

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
    component: Searchbar,
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
