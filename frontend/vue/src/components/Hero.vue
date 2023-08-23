<template>
  <Swiper
    class="swiper-slide"
    :modules="[Pagination, Autoplay]"
    :pagination="true"
    :autoplay="true"
  >
    <SwiperSlide v-for="photo in photos" :key="photo">
      <img src="../assets/hero.jpg" alt="img" />
    </SwiperSlide>
  </Swiper>
</template>

<script setup>
import { Swiper, SwiperSlide } from "swiper/vue";
import { Pagination, Autoplay } from "swiper/modules";
import "swiper/css/pagination";
import "swiper/css/autoplay";
import "swiper/css";

const photos = ["hero.jpg", "hero.jpg", "hero.jpg", "hero.jpg", "hero.jpg"];
</script>

<style lang="scss">
@import "../utils/theme.scss";
.swiper {
  height: 240px;

  & img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
}
@media screen and ($tablet) {
  .swiper {
    height: 500px;
  }
}
@media screen and ($desktop) {
  .swiper {
    height: 600px;
    height: calc(100vh - 92px);
  }
}
</style>
