import { createRouter, createWebHistory } from "vue-router";
import LoginPage from "../views/LoginPage.vue";
import RegisterPage from "../views/RegisterPage.vue";
import Navbar from "../components/Navbar/Navbar.vue";

const routes = [
  {
    path: "/",
    name: "HomePage",
    component: Navbar,
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
