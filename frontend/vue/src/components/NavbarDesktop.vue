<template>
  <div class="navbar">
    <img :src="Logo" alt="" class="navbar-logo" />

    <div class="navbar-items-wrapper">
      <ul>
        <li><router-link to="/">Početna</router-link></li>
        <li><router-link to="/proizvodi">Svi proizvodi</router-link></li>
        <li><router-link to="/pc-builder">PC Builder</router-link></li>
        <li><router-link to="/kontakt">Kontakt</router-link></li>
      </ul>
    </div>
    <div class="navbar-icons-wrapper">
      <PhUser :size="32" color="white" />
      <PhShoppingCartSimple :size="32" color="white" />
      <PhMoon :size="32" color="white" @click="toggleTheme" />
    </div>
  </div>
</template>

<script setup>
import Logo from "../assets/logo_new.png";
import { PhUser } from "@phosphor-icons/vue";
import { PhShoppingCartSimple } from "@phosphor-icons/vue";
import { PhMoon } from "@phosphor-icons/vue";
import { ref } from "vue";

const isDarkTheme = ref(true);

const toggleTheme = () => {
  document.querySelector("body").style.backgroundColor = isDarkTheme.value
    ? "#282828"
    : "#f5f5f5";

  document.querySelector(".pc-part-card-wrapper").style.backgroundColor =
    isDarkTheme.value ? "#282828" : "#f5f5f5";

  document.querySelector(".pc-part-card-wrapper").style.boxShadow =
    isDarkTheme.value ? "0 0 20px 0 #68E199" : "0 0 20px 0 #be166e";

  document.querySelector(".pc-part-card-text-group-name").style.color =
    isDarkTheme.value ? "#D9D9D9" : "#282828";

  document.querySelector(".pc-part-card-list-item").style.color =
    isDarkTheme.value ? "#D9D9D9" : "#282828";

  document.querySelector(".pc-part-card-price-wrapper").style.color =
    isDarkTheme.value ? "#D9D9D9" : "#282828";

  isDarkTheme.value = !isDarkTheme.value;
};
</script>

<style lang="scss">
.navbar {
  background: linear-gradient(to right, #343434, #5b02cc);
  height: 92px;
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding-bottom: 4px;
  padding-top: 4px;
}

.navbar-icons-wrapper {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  width: 150px;
  padding-right: 20px;

  svg {
    cursor: pointer;
  }
}

.navbar-logo {
  padding-left: 150px;
  width: 300px;
}

.navbar-items-wrapper {
  ul {
    list-style: none;
    display: flex;
    gap: 32px;
    justify-content: center;
    align-items: center;
    letter-spacing: 1px;

    a {
      text-decoration: none;
      color: white;
      text-transform: uppercase;
      font-size: 28px;
      font-weight: 500;
      cursor: pointer;
    }
  }
}
</style>
