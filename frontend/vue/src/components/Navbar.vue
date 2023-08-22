<template>
  <div class="navbar">
    <img :src="Logo" alt="" class="navbar-logo" />

    <div class="navbar-items-wrapper">
      <ul>
        <li>Proizvodi</li>
        <li>Akcija</li>
        <li>Kontakt</li>
        <li>Sastavi PC</li>
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
  //here we will make dark mode
  isDarkTheme.value = !isDarkTheme.value;
  document.querySelector("body").style.backgroundColor = isDarkTheme.value
    ? "#000000"
    : "#ffffff";
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

    li {
      color: white;
      text-transform: uppercase;
      font-size: 28px;
      font-weight: 500;
      cursor: pointer;
    }
  }
}
</style>
