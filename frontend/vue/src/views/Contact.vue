<template>
  <div class="contact-page-wrapper">
    <img src="../assets/cpu-grey.png" alt="" class="contact-page-grey-cpu" />
    <img src="../assets/gpu-grey.png" alt="" class="contact-page-grey-gpu" />
    <img
      src="../assets/keyboard-grey.png"
      alt=""
      class="contact-page-grey-keyboard"
    />

    <div class="contact-form-wrapper">
      <div class="contact-form-text-wrapper">
        <h2>Imate neko pitanje?</h2>
        <h4>Pošaljite nam poruku i mi ćemo odgovoriti u najkraćem roku</h4>
      </div>
      <form id="contact-form">
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
          placeholder="Email *"
          type="email"
          @update:inputValue="user.username = $event"
        />

        <Textarea placeholder="Sadržaj pitanja*" />
      </form>
    </div>

    <Button
      type="submit"
      text="POŠALJI UPIT"
      form="contact-form"
      shape="trapezoid"
    ></Button>
  </div>
</template>

<script setup>
import InputField from "../components/InputField.vue";
import Button from "../components/Button.vue";
import Textarea from "../components/Textarea.vue";
</script>

<style lang="scss" scoped>
@import "../utils/theme.scss";
.contact-page-wrapper {
  width: 100%;
  display: flex;
  align-items: center;
  flex-direction: column;
  padding-top: 48px;
  padding-bottom: 48px;
  position: relative;
  background-color: #eee3ff;

  img {
    position: absolute;
    visibility: hidden;

    @media screen and ($tabletLarge) {
      visibility: visible;
    }
  }

  .contact-form-wrapper {
    z-index: 1;
    max-width: 600px;
    background-color: $white-dark;
    width: 100%;
    border-radius: 8px;
    box-shadow: 0px 0px 8px $colorPrimary;
    padding-left: 48px;
    padding-right: 48px;
    padding-top: 16px;
    padding-bottom: 32px;

    h2 {
      font-family: $fontPrimary;
      color: $colorTextPrimary;
      margin-top: 32px;
      margin-bottom: 8px;
    }

    form {
      margin: 20px 0;
      justify-content: center;
      display: flex;
      align-items: center;
      flex-direction: column;
      gap: 24px;
    }
  }
}

.contact-form-text-wrapper {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
}

.contact-page-grey-gpu {
  left: -20px;
  height: 300px;
  transform: rotate(10deg);
}

.contact-page-grey-cpu {
  right: -100px;
  height: 300px;
  top: -20px;
  transform: rotate(30deg);
  z-index: 0;
}
.contact-page-grey-keyboard {
  height: 400px;
  bottom: -80px;
  left: 20%;
  transform: rotate(-20deg);
}
</style>
