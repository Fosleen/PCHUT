<template>
  <div>
    <form @submit="register">
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

<script>
export default {
  name: "RegisterPage",
};
</script>

<style></style>
