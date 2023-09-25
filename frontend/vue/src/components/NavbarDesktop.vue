<template>
  <div class="navbar">
    <router-link to="/"
      ><img :src="Logo" alt="" class="navbar-logo"
    /></router-link>

    <div class="navbar-items-wrapper">
      <ul>
        <li><router-link to="/">Početna</router-link></li>
        <li><router-link to="/proizvodi">Svi proizvodi</router-link></li>
        <li><router-link to="/pc-builder">PC Builder</router-link></li>
        <li><router-link to="/kontakt">Kontakt</router-link></li>
      </ul>
    </div>
    <div class="navbar-icons-wrapper">
      <div @click="signOut" v-if="isUserLoggedIn">
        <PhSignOut :size="32" color="white" />
      </div>
      <router-link to="/profil">
        <PhUser :size="32" color="white" />
      </router-link>
      <router-link to="/kosarica">
        <PhShoppingCartSimple :size="32" color="white" />
      </router-link>
      <PhMoon :size="32" color="white" @click="toggleTheme" />
    </div>
  </div>
</template>

<script setup>
import Logo from "../assets/logo_new.png";
import {
  PhUser,
  PhShoppingCartSimple,
  PhMoon,
  PhSignOut,
} from "@phosphor-icons/vue";
import { ref, onMounted } from "vue";
import store from "../store";
import router from "../router";

const isDarkTheme = ref(true);
const isUserLoggedIn = ref(!!store.state.user.token); // truthy or falsy

const toggleTheme = () => {
  const isDarkThemeValue = !isDarkTheme.value;
  const backgroundColor = isDarkThemeValue ? "#282828" : "#f5f5f5";
  const textColor = isDarkThemeValue ? "#D9D9D9" : "#282828";

  document.querySelector("body").style.backgroundColor = backgroundColor;

  const pcPartCardWrappers = document.querySelectorAll(".pc-part-card-wrapper");
  pcPartCardWrappers.forEach((pcPartCardWrapper) => {
    pcPartCardWrapper.style.backgroundColor = backgroundColor;
  });

  const pcPartCardListItems = document.querySelectorAll(
    ".pc-part-card-list-item"
  );
  pcPartCardListItems.forEach((pcPartCardListItem) => {
    pcPartCardListItem.style.color = textColor;
  });

  const pcPartCardTextGroupNames = document.querySelectorAll(
    ".pc-part-card-text-group-name"
  );
  pcPartCardTextGroupNames.forEach((pcPartCardTextGroupName) => {
    pcPartCardTextGroupName.style.color = textColor;
  });

  const pcPartCardPriceWrappers = document.querySelectorAll(
    ".pc-part-card-price-wrapper"
  );
  pcPartCardPriceWrappers.forEach((pcPartCardPriceWrapper) => {
    pcPartCardPriceWrapper.style.color = textColor;
  });

  const productDetailsWrapper = document.querySelector(
    ".product-details-wrapper"
  );
  if (productDetailsWrapper) {
    productDetailsWrapper.style.backgroundColor = backgroundColor;
  }

  isDarkTheme.value = isDarkThemeValue;
  saveThemePreference();
};

const saveThemePreference = () => {
  const themeToSave = isDarkTheme.value ? "dark" : "light";
  localStorage.setItem("theme", themeToSave);
};

const signOut = () => {
  localStorage.setItem("access_token", "");
  sessionStorage.setItem("cart", []);
  store
    .dispatch("logout")
    .then(() => {
      console.log("Uspjesna odjava");
      isUserLoggedIn.value = false;
      router.push("/")
    })
    .catch((err) => {
      console.log(`Error - ${err}`);
    });
};

onMounted(() => {
  const currentTheme = localStorage.getItem("theme");
  if (currentTheme === "dark") {
    isDarkTheme.value = true;
    toggleTheme();
  } else {
    isDarkTheme.value = false;
    toggleTheme();
  }
});
</script>

<style lang="scss">
@import "../utils/theme.scss";

.navbar {
  z-index: 2;
  position: relative;
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
  padding-right: 20px;

  svg {
    width: 50px;
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
