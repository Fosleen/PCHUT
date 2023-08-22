<template>
  <div class="login-outer">
    <div class="login-inner">
      <h2>Prijava</h2>
      <form @submit="login" id="login">
        <InputField
          placeholder="Email *"
          type="email"
          @update:inputValue="user.email = $event"
        />
        <InputField
          placeholder="Password *"
          type="password"
          @update:inputValue="user.password = $event"
        />
      </form>
    </div>
    <Button
      type="submit"
      text="Prijavi se"
      form="login"
      shape="trapezoid"
    ></Button>
  </div>
</template>

<script setup>
import store from "../store";
import InputField from "../components/InputField.vue";
import Button from "../components/Button.vue";

const user = {
  email: "",
  password: "",
};

function login(e) {
  e.preventDefault();
  console.log(user);

  store
    .dispatch("login", user)
    .then(() => {
      // router.push({
      //   name: "Dashboard",
      // });

      console.log("Uspjesna prijava");
    })
    .catch((err) => {
      console.log(`Nest je puklo: ${err}`);
    });
}
</script>

<style lang="scss">
@import "../utils/theme.scss";
.login-outer {
  width: 100%;
  display: flex;
  align-items: center;
  flex-direction: column;

  .login-inner {
    z-index: 1;
    max-width: 480px;
    background-color: $colorBgTertiary;
    width: 90%;
    text-align: center;
    border-radius: 8px;
    padding: 10px;
    box-shadow: 0px 0px 8px $colorPrimary;
    padding: 16px 8px 32px;

    h2 {
      font-family: $fontPrimary;
      text-transform: uppercase;
      color: $colorTextPrimary;
      margin: 32px;
    }

    & form {
      margin: 20px 0;
      justify-content: center;
      display: flex;
      align-items: center;
      flex-direction: column;
      gap: 24px;
    }
  }
}
</style>
