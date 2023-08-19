<template>
  <div class="auth-wrapper">
    <img class="img-1" src="../assets/cpu.png" alt="cpu" />
    <img class="img-2" src="../assets/gaming.png" alt="gaming" />
    <img class="img-3" src="../assets/gamingpc.png" alt="gamingpc" />
    <img class="img-4" src="../assets/graphics-card.png" alt="graphics" />
    <router-view></router-view>

    <p>
      {{ noAccountText }}
      <router-link :to="loginOrRegisterPath">
        {{ loginOrRegisterText }} </router-link
      >.
    </p>
  </div>
</template>

<script setup>
import { watchEffect } from "vue";
import { useRoute } from "vue-router";

const route = useRoute();
let loginOrRegisterPath;
let loginOrRegisterText;
let noAccountText;

watchEffect(() =>
  route.path == "/login"
    ? ((loginOrRegisterPath = "/register"),
      (noAccountText = "Već imaš račun?"),
      (loginOrRegisterText = "Registriraj se"))
    : ((loginOrRegisterPath = "/login"),
      (noAccountText = "Još nemaš račun?"),
      (loginOrRegisterText = "Prijavi se"))
);
</script>

<style lang="scss">
@import "../utils/theme.scss";

.auth-wrapper {
  overflow: hidden;
  background: linear-gradient(135deg, $colorBgPrimary, $colorPrimary);
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  position: relative;
  gap: 16px;

  p {
    color: $colorTextSecondary;
    font-size: 18px;
    letter-spacing: 2px;
    text-shadow: 1px 1px 15px rgb(7, 7, 7);
    font-weight: 400;
    z-index: 1;

    a {
      color: $colorTextSecondary;
    }
  }

  img {
    position: absolute;

    &.img-1 {
      top: 0;
      left: 25px;
      rotate: -20deg;
      width: 50%;
    }

    &.img-2 {
      display: none;
    }

    &.img-3 {
      display: none;
    }

    &.img-4 {
      display: none;
    }
  }
}

@media screen and ($tablet) {
  .auth-wrapper {
    gap: 32px;

    img {
      &.img-1 {
        right: 25%;
        width: 300px;
      }

      &.img-3 {
        display: block;
        bottom: -160px;
        right: -100px;
        rotate: 10deg;
        width: 300px;
      }
    }
  }
}

@media screen and ($desktop) {
  .auth-wrapper {
    gap: 48px;

    img {
      &.img-1 {
        top: 0;
        right: 25%;
        left: auto;
        width: 360px;
      }

      &.img-2 {
        display: block;
        bottom: -100px;
        left: 20%;
        rotate: -25deg;
        width: 320px;
      }

      &.img-3 {
        bottom: -20px;
        right: -100px;
        rotate: 10deg;
        width: 340px;
      }

      &.img-4 {
        display: block;
        top: 80px;
        left: 3%;
        rotate: 25deg;
        width: 270px;
      }
    }
  }
}
</style>
