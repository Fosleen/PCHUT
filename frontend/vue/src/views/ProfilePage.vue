<template>
  <div class="profile-wrapper">
    <div class="profile-container">
      <div class="profile-menu">
        <div class="profile-menu-item">
          <router-link to="/kosarica">Moje narudžbe</router-link>
        </div>
        <div class="profile-menu-item" @click="isEdit = true">
          Promijeni podatke
        </div>
        <div class="profile-menu-item">Kontaktirajte korisničku službu</div>
      </div>
      <div class="profile-content">
        <div
          class="profile-user-data-container"
          :class="[isEdit ? 'edit-mode' : '']"
        >
          <div class="profile-user-data-header">
            <h3>Osobni podaci</h3>
            <PhX
              :size="32"
              :class="[isEdit ? 'edit-mode' : '']"
              @click="isEdit = false"
            />
            <PhPencilSimpleLine
              :size="32"
              :class="[isEdit ? '' : 'edit-mode']"
              @click="isEdit = true"
            />
          </div>
          <div class="profile-user-data-list-items">
            <div class="profile-user-data-list-item">
              <h4>Ime</h4>
              <InputField
                :disabled="!isEdit"
                :inputValue="user.name"
                @update:inputValue="user.name = $event"
              />
            </div>
            <div class="profile-user-data-list-item">
              <h4>Prezime</h4>
              <InputField :disabled="!isEdit" :inputValue="user.surname" />
            </div>
            <div class="profile-user-data-list-item">
              <h4>Ulica i kućni broj</h4>
              <InputField :disabled="!isEdit" :inputValue="user.address" />
            </div>
            <div class="profile-user-data-list-item">
              <h4>Poštanski broj</h4>
              <InputField :disabled="!isEdit" :inputValue="user.postal" />
            </div>
            <div class="profile-user-data-list-item">
              <h4>Grad</h4>
              <InputField :disabled="!isEdit" :inputValue="user.city" />
            </div>
            <div class="profile-user-data-list-item">
              <h4>E-mail</h4>
              <InputField :disabled="!isEdit" :inputValue="user.email" />
            </div>
          </div>
        </div>
        <div class="profile-buttons">
          <Button
            type="button"
            text="Odustani"
            shape="trapezoid grey"
            :class="[isEdit ? 'edit-mode' : '']"
            @click="isEdit = false"
          ></Button>
          <Button
            type="button"
            text="Spremi"
            shape="trapezoid"
            :class="[isEdit ? 'edit-mode' : '']"
          ></Button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import Button from "../components/Button.vue";
import InputField from "../components/InputField.vue";
import store from "../store";
import { PhX, PhPencilSimpleLine } from "@phosphor-icons/vue";

import { ref, onMounted } from "vue";

const isEdit = ref(false);

const user = ref({
  name: "",
  surname: "",
  username: "",
  email: "",
  password: "",
  address: "",
  postal: "",
  city: "",
});

onMounted(async () => {
  user.value = store.getters.getUserData;
  console.log(user.value);
});
</script>

<style lang="scss">
@import "../utils/theme.scss";

.profile-wrapper {
  .profile-container {
    .profile-menu {
      background-color: $colorBgPrimary;
      box-shadow: 0 0 8px rgba(0, 0, 0, 0.25);
      padding: 0 16px;

      .profile-menu-item {
        padding: 16px 0;
        font-size: 24px;
        border-bottom: 3px solid $colorTextSecondary;

        a {
          text-decoration: none;
          color: $colorTextPrimary;
        }

        &:hover {
          background-color: $white-dark;
          cursor: pointer;
        }

        &:last-child {
          margin-bottom: 0;
          border-bottom: none;
        }
      }
    }

    .profile-content {
      .profile-user-data-container {
        padding: 24px 0;

        .profile-user-data-header {
          display: flex;
          justify-content: space-between;
          align-items: center;
          padding: 16px;
          margin-bottom: 12px;

          svg {
            display: none;
            color: $colorTextPrimary;
            cursor: pointer;

            &.edit-mode {
              display: block;
            }

            &:hover {
              transition: 1s;
              padding: 8px;
              background-color: $colorPrimary;
              color: $colorTextSecondary;
              border-radius: 8px;
            }
          }
        }

        h3 {
          font-size: 24px;
          color: $grey-dark;
        }

        .profile-user-data-list-items {
          display: flex;
          flex-direction: column;
          gap: 8px;
          margin: 0 16px;

          .profile-user-data-list-item {
            h4 {
              font-size: 20px;
              font-weight: 500;
              color: $colorTextPrimary;
            }
          }
        }

        &.edit-mode {
          border-bottom: 5px solid $colorPrimary;
        }
      }

      .profile-buttons {
        justify-content: space-between;
        display: flex;
        visibility: hidden;

        & .edit-mode {
          visibility: visible;
        }
      }
    }
  }
}

@media screen and ($tablet) {
  .profile-wrapper {
    .profile-container {
      .profile-menu {
        padding: 8px 48px;

        .profile-menu-item {
          padding: 20px 0;
        }
      }

      .profile-content {
        .profile-user-data-container {
          padding: 24px 32px;

          h3 {
            font-size: 28px;
            padding: 24px 0;
            font-weight: 600;
          }

          .profile-user-data-list-items {
            gap: 12px;

            .profile-user-data-list-item {
              h4 {
                font-size: 24px;
                padding-bottom: 4px;
              }
            }
          }
        }
      }
    }
  }
}

@media screen and ($desktop) {
  .profile-wrapper {
    .profile-container {
      display: flex;
      gap: 24px;
      max-width: 1200px;
      margin: 0 auto;
      padding: 24px 0;

      .profile-menu {
        flex: 3;
        background-color: $colorBgPrimary;
        padding: 24px;

        .profile-menu-item {
          padding: 16px;
        }
      }

      .profile-content {
        flex: 6;

        .profile-user-data-container {
          box-shadow: 0 0 8px rgba(0, 0, 0, 0.25);
          padding: 24px;

          h3 {
            padding: 16px;
          }

          .profile-user-data-list-items {
            gap: 16px;
            padding: 16px;

            .profile-user-data-list-item {
              display: flex;

              h4 {
                width: 200px;
                font-size: 20px;
                font-weight: 600;
                letter-spacing: 0.5px;
                display: flex;
                align-items: center;
                padding-bottom: 0;
              }
            }
          }
        }
      }
    }
  }
}
</style>
