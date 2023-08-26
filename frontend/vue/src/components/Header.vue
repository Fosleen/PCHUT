<template>
  <div class="header">
    <div class="header-items">
      <div v-if="isDesktop" class="desktop">
        <NavbarDesktop />
      </div>
      <div v-else class="mobile">
        <NavbarMobile />
      </div>
    </div>
  </div>
</template>

<script>
import NavbarDesktop from "../components/NavbarDesktop.vue";
import NavbarMobile from "../components/NavbarMobile.vue";

export default {
  components: {
    NavbarDesktop,
    NavbarMobile,
  },
  data() {
    return {
      isDesktop: window.innerWidth > 768,
    };
  },
  methods: {
    updateMedia() {
      this.isDesktop = window.innerWidth > 1050;
    },
  },
  mounted() {
    window.addEventListener("resize", this.updateMedia);
  },
  beforeDestroy() {
    window.removeEventListener("resize", this.updateMedia);
  },
};
</script>

<style></style>
