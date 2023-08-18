<template>
  <div class="login-wrapper">
    <img class="img-1" src="../assets/cpu.png" alt="cpu" />
    <img class="img-2" src="../assets/gaming.png" alt="gaming" />
    <img class="img-3" src="../assets/gamingpc.png" alt="gamingpc" />
    <img class="img-4" src="../assets/graphics-card.png" alt="graphics" />
    <div class="login-inner">
      <h2>Login</h2>
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
    <Button type="submit" text="Prijavi se" form="login"></Button>
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

.login-wrapper {
  overflow: hidden;
  background: linear-gradient(135deg, $colorBgPrimary, $colorPrimary);
  width: 100%;
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  position: relative;

  img {
    position: absolute;

    &.img-1 {
      top: 0;
      left: 25px;
      rotate: -20deg;
      width: 50%;
    }

    &.img-2 {
      display: none;
    }

    &.img-3 {
      bottom: -20px;
      right: -100px;
      rotate: 10deg;
      width: 70%;
    }

    &.img-4 {
      display: none;
    }
  }

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

@media screen and ($tablet) {
  .login-wrapper {
    img {
      &.img-1 {
        right: 25%;
        width: 300px;
      }

      &.img-3 {
        width: 300px;
      }
    }
  }
}

@media screen and ($desktop) {
  .login-wrapper {
    img {
      &.img-1 {
        top: 0;
        right: 25%;
        left: auto;
        width: 360px;
      }

      &.img-2 {
        display: block;
        bottom: -100px;
        left: 20%;
        rotate: -25deg;
        width: 320px;
      }

      &.img-3 {
        bottom: -20px;
        right: -100px;
        rotate: 10deg;
        width: 340px;
      }

      &.img-4 {
        display: block;
        top: 80px;
        left: 3%;
        rotate: 25deg;
        width: 270px;
      }
    }
  }
}
</style>
