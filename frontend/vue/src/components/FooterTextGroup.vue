<template>
  <div class="footer-text-group-item-wrapper">
    <h4 class="footer-text-group-name">{{ textGroupName }}</h4>
    <ul class="footer-ul">
      <li
        v-for="(item, index) in textGroupItems"
        :key="index"
        class="footer-list-item"
      >
        {{ item }}
      </li>
    </ul>
  </div>
</template>

<script setup>
import { defineProps } from "vue";

const props = defineProps({
  textGroupName: String,
  textGroupItems: Array,
});
</script>

<style lang="scss">
@import "../utils/theme.scss";

.footer-text-group-item-wrapper {
  margin-bottom: 32px;

  .footer-text-group-name {
    text-transform: uppercase;
    font-weight: 500;
    font-size: 22px;
    margin-bottom: 15px;
    text-align: center;
  }

  .footer-ul {
    list-style: none;
    padding: 0;

    .footer-list-item {
      margin-bottom: 12px;
      font-size: 18px;
      font-weight: 100;
      text-align: center;
    }
  }
}

@media screen and ($tabletLarge) {
  .footer-text-group-item-wrapper {
    .footer-text-group-name {
      margin-bottom: 10px;
      font-size: 22px;
      text-align: left;
    }

    .footer-ul {
      .footer-list-item {
        text-align: left;
      }
    }
  }
}
</style>
