<template>
  <div>
    <router-link to="/mouse/1"> <p>Mis</p></router-link>
    <router-link to="/cpu/1"> <p>CPU</p></router-link>
    <router-link to="/gpu/1"> <p>GPU</p></router-link>
    <router-link to="/monitor/1"> <p>Monitor</p></router-link>
    <router-link to="/motherboard/1"> <p>Maticna</p></router-link>
    <router-link to="/keyboard/1"> <p>Tipkovnica</p></router-link>
  </div>
</template>

<script setup>
import PCPartCard from "../components/PCPartCard.vue";
</script>

<style lang="scss" scoped></style>
