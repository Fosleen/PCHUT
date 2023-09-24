<template>
  <dialog id="modal">
    <p>{{ props.text }}</p>
    <form method="dialog">
      <button @click="$emit('cancelClick')">Odustani</button>
      <button @click="$emit('confirmClick')">Da</button>
    </form>
  </dialog>
</template>

<script setup>
const props = defineProps({
  text: String,
});

defineExpose({
  show,
  close,
});

function show() {
  console.log("show");
  modal.showModal();
}

function close(a) {
  console.log("closee");
  modal.close();
}
</script>

<style lang="scss">
@import "../utils/theme.scss";

#modal {
  width: 90%;
  box-shadow: 0 0 60px rgba(0, 0, 0, 0.5);
  border-radius: 8px;
  padding: 16px;
  margin: 60% auto;
  box-shadow: 0 0 60px rgba(0, 0, 0, 0.5);

  &::backdrop {
    background-color: rgba(1, 4, 53, 0.3);
  }

  p {
    padding: 8px;
    font-size: 18px;
    margin-bottom: 8px;
  }

  form {
    display: flex;
    justify-content: space-between;
    gap: 8px;

    button {
      border-radius: 4px;
      width: 100%;
      font-size: 16px;

      &:last-child {
        background-color: $colorTextPrimary;
      }

      &:hover {
        background-color: $colorSecondary;
      }
    }
  }
}
@media screen and ($tablet) {
  #modal {
    margin: 240px auto;
    max-width: 320px;
  }
}
</style>
