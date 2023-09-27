<template>
  <div class="wrapper">
    <Splide
      aria-labelledby="thumbnail-example-heading"
      :options="mainOptions"
      ref="main"
    >
      <SplideSlide v-for="(slide, index) in slides" :key="slide">
        <img :src="slide" :alt="`img ${index + 1}`" />
      </SplideSlide>
    </Splide>

    <Splide
      aria-label="The carousel with thumbnails. Selecting a thumbnail will change the main carousel"
      :options="thumbsOptions"
      ref="thumbs"
      style="transform: translateX(0px)"
    >
      <SplideSlide v-for="(slide, index) in slides" :key="slide">
        <img :src="slide" :alt="`img ${index + 1}`" />
      </SplideSlide>
    </Splide>
  </div>
</template>

<script setup>
import { defineProps, onMounted, ref } from "vue";
import { Splide, SplideSlide } from "@splidejs/vue-splide";
import "@splidejs/vue-splide/css";
import "@splidejs/vue-splide/css/sea-green";

const props = defineProps({
  images: Array,
});

const main = ref();
const thumbs = ref();
const slides =
  props.images.length === 0
    ? [
        "https://www.mobismea.com/upload/iblock/2a0/2f5hleoupzrnz9o3b8elnbv82hxfh4ld/No%20Product%20Image%20Available.png",
      ]
    : props.images;

const mainOptions = {
  type: "loop",
  perPage: 1,
  perMove: 1,
  gap: "1rem",
  pagination: true,
  autoWidth: true,
  arrows: false,
};

const thumbsOptions = {
  type: "slide",
  rewind: true,
  gap: "4px",
  pagination: false,
  fixedWidth: 90,
  fixedHeight: 70,
  cover: true,
  focus: "left",
  isNavigation: true,
  updateOnMove: true,
  arrows: false,
  breakpoints: {
    480: {
      fixedWidth: 50,
      fixedHeight: 40,
    },
  },
};

onMounted(() => {
  const thumbsSplide = thumbs.value?.splide;

  if (thumbsSplide) {
    main.value?.sync(thumbsSplide);
  }
});
</script>

<style lang="scss">
@import "../utils/theme.scss";

.wrapper {
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.splide {
  padding: 8px;
}

.splide__slide {
  width: 100vw;
  max-width: 500px;

  & img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
}

@media screen and ($tablet) {
  .wrapper {
    max-width: 55%;
  }

  .splide__slide {
    width: 100%;
    margin: 0;
    max-width: 650px;
    flex-direction: column;

    & img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
  }
}
</style>
