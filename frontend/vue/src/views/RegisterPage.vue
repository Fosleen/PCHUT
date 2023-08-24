<template>
  <div class="register-outer">
    <div class="register-inner">
      <h2>Registracija</h2>
      <form @submit="register" id="register">
        <InputField
          placeholder="Ime *"
          type="text"
          @update:inputValue="user.name = $event"
        />
        <InputField
          placeholder="Prezime *"
          type="text"
          @update:inputValue="user.surname = $event"
        />
        <InputField
          placeholder="Korisničko ime *"
          type="text"
          @update:inputValue="user.username = $event"
        />
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
      text="REGISTRIRAJ SE"
      form="register"
      shape="trapezoid"
    ></Button>
  </div>
</template>

<script setup>
import store from "../store";
import Button from "../components/Button.vue";
import InputField from "../components/InputField.vue";

const user = {
  name: "",
  surname: "",
  username: "",
  email: "",
  password: "",
};

function register(e) {
  e.preventDefault();
  console.log(user);

  store
    .dispatch("register", user)
    .then(() => {
      // router.push({
      //   name: "Dashboard",
      // });

      console.log("Uspjesna registracija");
    })
    .catch((err) => {
      console.log(`Nest je puklo: ${err}`);
    });
}
</script>

<style lang="scss">
@import "../utils/theme.scss";
.register-outer {
  width: 100%;
  display: flex;
  align-items: center;
  flex-direction: column;

  .register-inner {
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
