<template>
  <div class="submenu-wrapper">
    <div class="submenu-container">
      <router-link to="/proizvodi">
        <div class="submenu-items">
          <PhDesktopTower :size="20" />
          <p>GRAFIČKE KARTICE</p>
        </div>
      </router-link>
      <router-link to="/proizvodi">
        <div class="submenu-items" @click="quickSearch('cpu')">
          <PhCpu :size="20" />
          <p>PROCESORI</p>
        </div>
      </router-link>
      <router-link to="/proizvodi">
        <div class="submenu-items" @click="quickSearch('keyboard')">
          <PhKeyboard :size="20" />
          <p>TIPKOVNICE</p>
        </div>
      </router-link>
      <router-link to="/proizvodi">
        <div class="submenu-items" @click="quickSearch('mouse')">
          <PhMouse :size="20" />
          <p>MIŠEVI</p>
        </div>
      </router-link>
      <router-link to="/proizvodi">
        <div class="submenu-items more" @click="quickSearch('mouse')">
          <p>VIŠE</p>
        </div>
      </router-link>
    </div>
    <div class="submenu-searchbar"><Searchbar /></div>
  </div>
</template>

<script setup>
import Logo from "../assets/logo_new.png";
import {
  PhCpu,
  PhKeyboard,
  PhMouse,
  PhDesktopTower,
} from "@phosphor-icons/vue";
import Searchbar from "./Searchbar.vue";
</script>

<style lang="scss">
@import "../utils/theme.scss";

.submenu-wrapper {
  display: none;
}

@media screen and ($desktop) {
  .submenu-wrapper {
    background-color: $colorTextPrimary;
    display: flex;
    align-items: center;
    justify-content: space-between;

    a {
      text-decoration: none;
    }

    .submenu-container {
      display: flex;
      gap: 48px;
      padding: 0 16px;
      justify-content: space-between;
      width: fit-content;
      max-width: 1200px;
      margin: 0 auto;
      margin-left: 150px;
      align-items: center;

      .submenu-items {
        display: flex;
        color: $colorTextSecondary;
        gap: 8px;
        cursor: pointer;

        p {
          color: $colorTextSecondary;
        }

        &.more {
          text-decoration: underline;
        }
      }
    }
  }
}

@media screen and ($desktopLarge) {
  .submenu-wrapper {
    .submenu-container {
      gap: 64px;
    }
  }
}
</style>
