<template>
  <div class="contact-page-wrapper">
    <div class="contact-form-wrapper">
      <h2>Kontakt</h2>
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

  .contact-form-wrapper {
    z-index: 1;
    max-width: 480px;
    background-color: $white-dark;
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
</style>
