<template>
  <div style="width: 500px; height: 300px; background-color: red">
    <div class="pc-builder-component-card-wrapper">
      <div class="pc-builder-component-card-image-wrapper">
        <img
          src="https://www.instar-informatika.hr/slike/velike/graficka-asus-geforce-rtx4080-rog-strix-oc-16gb-gddr6x-29830-46145057_1.jpg"
          alt=""
        />
      </div>
    </div>
  </div>
</template>

<script setup></script>

<style>
.pc-builder-component-card-wrapper {
  background-color: #343434;
  width: 100%;
}

.pc-builder-component-card-image-wrapper {
  height: 100px;

  img {
    object-fit: cover;
  }
}
</style>
