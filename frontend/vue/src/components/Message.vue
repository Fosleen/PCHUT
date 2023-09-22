<template>
  <div class="message-wrapper">
    <img
      v-if="props.imageName == 'empty-cart'"
      src="../assets/empty-cart.png"
      :alt="`${props.imageName}.png`"
    />
    <img
      v-if="props.imageName == 'empty-order'"
      src="../assets/empty-order.png"
      :alt="`${props.imageName}.png`"
    />
    <p>{{ props.text }}</p>
  </div>
</template>

<script setup>
const props = defineProps({
  text: String,
  imageName: String,
});
</script>

<style lang="scss">
@import "../utils/theme.scss";

.message-wrapper {
  background-color: $colorBgPrimary;
  border-radius: 8px;
  box-shadow: $colorBtnSecondary 0px 0px 8px;
  padding: 20px;
  margin: 0 16px;
  display: flex;
  align-items: center;
  gap: 16px;
  color: $colorTextPrimary;
  justify-content: center;

  img {
    max-width: 64px;
  }

  p {
    font-size: 20px;
  }
}

@media screen and ($tablet) {
  .message-wrapper {
    padding: 20px;
    margin: 0 16px;
    max-width: 600px;
    margin: 24px auto;

    img {
      max-width: 128px;
    }

    p {
      font-size: 20px;
    }
  }
}

@media screen and ($desktop) {
}
</style>
