import { createRouter, createWebHistory } from "vue-router";
import LoginPage from "../views/LoginPage.vue";
import RegisterPage from "../views/RegisterPage.vue";

import Navbar from "../components/Navbar.vue";
import PCBuilderComponentCard from "../components/PCBuilderComponentCard.vue";
import Footer from "../components/Footer.vue";


const routes = [
  {
    path: "/",
    name: "HomePage",
    component: Footer,
  },
  {
    path: "/login",
    name: "Login",
    component: LoginPage,
  },
  {
    path: "/register",
    name: "Register",
    component: RegisterPage,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
