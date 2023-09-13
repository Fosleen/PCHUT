<template>
  <router-link to="/pc-builder">
    <div class="build-pc-button-wrapper">
      <div class="build-pc-button-border">
        <div class="build-pc-button-content">
          <h2>Izgradi PC</h2>
          <PhHammer :size="44" color="#2e0167" weight="fill" />
        </div>
      </div>
    </div>
  </router-link>
</template>

<script setup>
import { PhHammer } from "@phosphor-icons/vue";
</script>

<style lang="scss">
@import "../utils/theme.scss";

.build-pc-button-wrapper {
  display: inline-block;
  position: relative;
  width: 320px;
  height: 80px;
  background: $colorBtnPrimary;
  box-sizing: border-box;
  cursor: pointer;
  clip-path: polygon(75% 0%, 91% 50%, 75% 100%, 0% 100%, 9% 50%, 0% 0%);
  text-transform: uppercase;

  .build-pc-button-border {
    width: 300px;
    height: 80px;
    background: $colorTextSecondary;
    color: $colorSecondary;
    padding: 8px;
    display: flex;
    align-items: center;
    font-size: 20px;
    clip-path: polygon(75% 0%, 91% 50%, 75% 100%, 0% 100%, 9% 50%, 0% 0%);
    cursor: pointer;

    .build-pc-button-content {
      display: flex;
      gap: 16px;
      margin-left: 36px;
      letter-spacing: 1px;
      word-spacing: 4px;

      & h2 {
        display: flex;
        align-items: center;
      }
    }
  }

  &:hover {
    background: $colorSecondary;
    transition: 0.5s;

    & .build-pc-button-border {
      background: $colorTextTertiary;
      transition: 1s;
    }
  }
}

@media screen and ($tablet) {
  .build-pc-button-wrapper {
    width: 400px;
    height: 92px;

    .build-pc-button-border {
      width: 380px;
      height: 92px;
      padding: 24px;
      font-size: 24px;

      .build-pc-button-content {
        gap: 16px;
        margin-left: 36px;
      }
    }
  }

  a {
    width: fit-content;
  }
}
</style>
