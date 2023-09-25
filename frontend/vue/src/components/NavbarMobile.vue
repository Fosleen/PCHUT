<template>
  <div>
    <div class="mobile-nav-icons">
      <PhX v-if="openNav" @click="navHandler" class="iconBar" :size="32" />
      <PhList v-else @click="navHandler" class="iconBar" :size="32" />
      <router-link to="/">
        <img src="../assets/logo_new.png" alt="" class="mobile-nav-logo" />
      </router-link>
    </div>
    <div v-if="openNav" class="mobile-navbar-wrapper">
      <div class="navbar-items-wrapper-mobile">
        <ul>
          <li>
            <router-link to="/" @click.native="closeNav">Početna</router-link>
          </li>
          <li>
            <router-link to="/proizvodi" @click.native="closeNav">
              Svi proizvodi
            </router-link>
          </li>
          <li>
            <router-link to="/pc-builder" @click.native="closeNav">
              PC Builder
            </router-link>
          </li>
          <li>
            <router-link to="/kontakt" @click.native="closeNav">
              Kontakt
            </router-link>
          </li>
          <div class="mobile-navbar-ph-icons">
            <router-link to="/profil" @click.native="closeNav">
              <PhUser :size="32" color="white" />
            </router-link>
            <router-link to="/kosarica" @click.native="closeNav">
              <PhShoppingCartSimple :size="32" color="white" />
            </router-link>
            <PhMoon :size="32" color="white" />
          </div>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
import {
  PhUser,
  PhShoppingCartSimple,
  PhMoon,
  PhX,
  PhList,
} from "@phosphor-icons/vue";

export default {
  components: {
    PhList,
    PhX,
    PhUser,
    PhShoppingCartSimple,
    PhMoon,
  },
  data() {
    return {
      openNav: false,
    };
  },
  methods: {
    navHandler() {
      this.openNav = !this.openNav;
    },

    closeNav() {
      this.openNav = false;
    },
  },
};
</script>

<style lang="scss">
.hidden {
  display: none;
}

.iconBar {
  cursor: pointer;
}

.mobile-navbar-wrapper {
  display: flex;
  justify-content: center;
  background: linear-gradient(to right, #343434, #5b02cc);
  padding-top: 12px;
  padding-bottom: 12px;
  position: relative;
  z-index: 1;
}

.navbar-items-wrapper-mobile {
  ul {
    list-style: none;
    display: flex;
    flex-direction: column;
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

.mobile-nav-logo {
  height: 32px;
}

.mobile-nav-icons {
  display: flex;
  align-items: center;
  justify-content: space-between;
  height: 48px;
  background-color: white;
  z-index: 1;
  position: relative;
}

.mobile-navbar-ph-icons {
  display: flex;
  gap: 24px;
}
</style>
