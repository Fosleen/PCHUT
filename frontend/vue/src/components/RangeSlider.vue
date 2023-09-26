<template>
  <div>
    <Slider
      v-model="value"
      :max="2500"
      :format="{ suffix: ' €', decimals: 0 }"
      :tooltips="true"
      showTooltip="drag"
      @slide="handlePriceRangeChange"
    />
  </div>
</template>

<script>
import Slider from "@vueform/slider";

export default {
  components: {
    Slider,
  },

  data() {
    return {
      value: [0, 2500],
    };
  },

  methods: {
    setDefaultValues() {
      this.value[0] = 0;
      this.value[1] = 2500;
    },
    handlePriceRangeChange(values) {
      this.$emit("priceRangeChange", values[0], values[1]);
    },
  },
};
</script>

<style src="@vueform/slider/themes/default.css"></style>
