<template>
  <div>
    <form @submit="login">
      <label for="email">Email adresa</label>
      <input type="email" id="email" name="email" v-model="user.email" />
      <label for="password">Password</label>
      <input
        type="password"
        id="password"
        name="password"
        v-model="user.password"
      />

      <button type="submit">Prijavi se</button>
    </form>
  </div>
</template>

<script setup>
import store from "../store";
import { useRouter } from "vue-router";
import { ref } from "vue";

const user = {
  email: "",
  password: "",
};

function login(e) {
  e.preventDefault();

  store
    .dispatch("login", user)
    .then(() => {
      // router.push({
      //   name: "Dashboard",
      // });

      console.log("Uspjesna prijava");
    })
    .catch((err) => {
      console.log("Nest je puklo");
    });
}
</script>

<style></style>
