<template>
  <div class="wrapper">
    <Splide
      aria-labelledby="thumbnail-example-heading"
      :options="mainOptions"
      ref="main"
    >
      <SplideSlide v-for="slide in slides" :key="slide.alt">
        <img :src="slide.src" :alt="slide.alt" />
      </SplideSlide>
    </Splide>

    <Splide
      aria-label="The carousel with thumbnails. Selecting a thumbnail will change the main carousel"
      :options="thumbsOptions"
      ref="thumbs"
    >
      <SplideSlide v-for="slide in slides" :key="slide.alt">
        <img :src="slide.src" :alt="slide.alt" />
      </SplideSlide>
    </Splide>
  </div>
</template>

<script>
import { Splide, SplideSlide } from "@splidejs/vue-splide";
import { defineComponent, onMounted, ref } from "vue";
import "@splidejs/vue-splide/css";

import "@splidejs/vue-splide/css/sea-green";

// import "@splidejs/vue-splide/css/core";

export default defineComponent({
  name: "ThumbanailCarousel",

  components: {
    Splide,
    SplideSlide,
  },

  setup() {
    const main = ref();
    const thumbs = ref();
    const slides = generateSlides();

    function generateSlides(length = 10, sig = 0) {
      return Array.from({ length }).map((value, index) => {
        index = sig || index;

        return {
          src: `https://source.unsplash.com/random/800x650?sig=${index}`,
          alt: `Image ${index}`,
        };
      });
    }
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
      focus: "center",
      isNavigation: true,
      updateOnMove: true,
      arrows: false,
    };

    onMounted(() => {
      const thumbsSplide = thumbs.value?.splide;

      if (thumbsSplide) {
        main.value?.sync(thumbsSplide);
      }
    });

    return {
      slides,
      main,
      thumbs,
      mainOptions,
      thumbsOptions,
    };
  },
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
  margin: 0 auto;
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
    margin: 0 auto;
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
