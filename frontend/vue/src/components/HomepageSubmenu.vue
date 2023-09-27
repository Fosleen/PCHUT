<template>
  <div class="submenu-wrapper">
    <div class="submenu-container">
      <a href="/#gpu">
        <div class="submenu-items">
          <PhDesktopTower :size="20" />
          <p>GRAFIČKE KARTICE</p>
        </div>
      </a>
      <a href="/#cpu">
        <div class="submenu-items" @click="quickSearch('cpu')">
          <PhCpu :size="20" />
          <p>PROCESORI</p>
        </div>
      </a>
      <a href="/#mb">
        <div class="submenu-items" @click="quickSearch('keyboard')">
          <PhSquareLogo :size="20" />
          <p>MATIČNE PLOČE</p>
        </div>
      </a>
      <a href="/#ram">
        <div class="submenu-items" @click="quickSearch('mouse')">
          <PhRuler :size="20" />
          <p>RAM MEMORIJE</p>
        </div>
      </a>
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
  PhSquareLogo,
  PhRuler,
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
        align-items: center;

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
