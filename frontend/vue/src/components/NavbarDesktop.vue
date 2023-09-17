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
import { PhUser, PhShoppingCartSimple, PhMoon } from "@phosphor-icons/vue";
import { ref, onMounted } from "vue";

const isDarkTheme = ref(true);

const toggleTheme = () => {
  const isDarkThemeValue = !isDarkTheme.value;
  const backgroundColor = isDarkThemeValue ? "#282828" : "#f5f5f5";
  const textColor = isDarkThemeValue ? "#D9D9D9" : "#282828";
  const shadowColor = isDarkThemeValue ? "#68E199" : "";

  // Apply styles here

  document.querySelector("body").style.backgroundColor = backgroundColor;

  const pcPartCardWrappers = document.querySelectorAll(".pc-part-card-wrapper");
  pcPartCardWrappers.forEach((pcPartCardWrapper) => {
    pcPartCardWrapper.style.backgroundColor = backgroundColor;
    pcPartCardWrapper.style.boxShadow = `0 0 20px 0 ${shadowColor}`;
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
