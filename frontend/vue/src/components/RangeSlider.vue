<template>
  <div>
    <Slider
      v-model="value"
      :max="600"
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
      value: [0, 600], // default values
    };
  },

  methods: {
    handlePriceRangeChange(values) {
      this.$emit("priceRangeChange", values[0], values[1]);
    },
  },
};
</script>

<style src="@vueform/slider/themes/default.css"></style>
