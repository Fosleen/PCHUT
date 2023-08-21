<template>
  <div style="height: 600px; width: 400px">
    <!--remove this div, add props to this component-->
    <div class="pc-part-card-wrapper">
      <div class="pc-part-card-image-wrapper">
        <img src="../assets/best_buy_2_logo.png" alt="" />
      </div>
      <div class="pc-part-card-text-wrapper">
        <PCPartCardList
          text-group-name="Najjača grafička kartica e"
          :text-group-items="[
            '6GB memorije',
            'Nvidia CUDA tehnologija',
            'Super za gaming',
          ]"
        />

        <h3>Dostupno</h3>
        <h2>2500E</h2>
      </div>

      <div class="pc-part-card-button-wrapper">
        <button class="odd-shape">Dodaj u košaricu</button>
      </div>
    </div>
  </div>
</template>

<script setup>
import Button from "./Button.vue";
import PCPartCardList from "./PCPartCardList.vue";
</script>

<style lang="scss" scoped>
/* @import url("../utils/theme.scss"); //iz nekog razloga ovo ne radi u ovom fileu... */
.pc-part-card-wrapper {
  background-color: #eaeaea;
  width: 100%;
  padding-top: 12px;
  box-shadow: 0 0 20px #be166e;
  outline: 3px solid transparent;
  outline-offset: -3px;
  padding-left: 16px;
  padding-right: 16px;
}

.pc-part-card-image-wrapper {
  background-color: white;
  height: 240px;
  margin-bottom: 16px;
  img {
    object-fit: contain;
    height: 100%;
    width: 100%;
  }
}

.pc-part-card-text-wrapper {
  h3 {
    color: #36ae51;
    font-size: 20px;
  }

  h2 {
    font-size: 32px;
    margin-bottom: 8px;
    color: #282828;
  }
}

.pc-part-card-button-wrapper {
  display: flex;
  justify-content: center;
  padding-bottom: 16px;
}

.odd-shape {
  //add this to button
  background-color: #d9d9d9;
  clip-path: polygon(15% 0, 85% 0, 100% 100%, 0% 100%);
  color: #282828;
  font-weight: 700;
}
</style>
