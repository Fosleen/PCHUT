<template>
  <router-link
    :to="{
      name: 'ProductDetails',
      params: {
        productable_type: getModelName(),
        id: component.productable_id,
      },
    }"
    class="pc-part-card-link"
  >
    <div class="pc-part-card-wrapper">
      <div class="pc-part-card-image-wrapper">
        <img :src="image" alt="" />
      </div>
      <div class="pc-part-card-text-wrapper">
        <PCPartCardList
          v-if="getModelName() == 'GPU'"
          :text-group-name="
            component.product_type_cro +
            ' ' +
            component.manufacturer.name +
            ' ' +
            component.model
          "
          :text-group-items="[
            'Model: ' + component.model,
            'Memorija: ' + component.memory + ' GB',
          ]"
        />
        <PCPartCardList
          v-if="getModelName() == 'CPU'"
          :text-group-name="
            component.product_type_cro +
            ' ' +
            component.manufacturer.name +
            ' ' +
            component.model +
            ', ' +
            component.socket.name
          "
          :text-group-items="[
            'Model: ' + component.model,
            'Podnožje: ' + component.socket.name,
            'Broj jezgri: ' + component.cores,
          ]"
        />
        <PCPartCardList
          v-if="getModelName() == 'Motherboard'"
          :text-group-name="
            component.product_type_cro +
            ' ' +
            component.manufacturer.name +
            ' ' +
            component.model
          "
          :text-group-items="[
            'Model: ' + component.model,
            'Memorija: ' + component.ram_type.name,
            'Podnožje: ' + component.socket.name,
          ]"
        />
        <PCPartCardList
          v-if="getModelName() == 'RAM'"
          :text-group-name="
            component.product_type_cro +
            ' ' +
            component.manufacturer.name +
            ' ' +
            component.model +
            ', ' +
            component.speed +
            'MHz'
          "
          :text-group-items="[
            'Brzina: ' + component.speed + 'MHz',
            'Vrsta: ' + component.ram_type,
          ]"
        />
        <PCPartCardList
          v-if="getModelName() == 'Cooling'"
          :text-group-name="
            component.product_type_cro +
            ' ' +
            component.manufacturer.name +
            ' ' +
            component.model
          "
          :text-group-items="['Vrsta hlađenja: ' + component.cooling_type.name]"
        />
        <PCPartCardList
          v-if="getModelName() == 'PcCase'"
          :text-group-name="
            component.product_type_cro +
            ' ' +
            component.manufacturer.name +
            ' ' +
            component.model
          "
          :text-group-items="['Veličina: ' + component.case_size.name]"
        />
        <PCPartCardList
          v-if="getModelName() == 'PSU'"
          :text-group-name="
            component.product_type_cro +
            ' ' +
            component.manufacturer.name +
            ' ' +
            component.model
          "
          :text-group-items="['Snaga: ' + component.power + 'W']"
        />
        <PCPartCardList
          v-if="getModelName() == 'Mouse'"
          :text-group-name="
            component.product_type_cro +
            ' ' +
            component.manufacturer.name +
            ' ' +
            component.model
          "
          :text-group-items="[
            'Vrsta: ' + (component.wired ? 'žičan' : 'bežičan'),
          ]"
        />
        <PCPartCardList
          v-if="getModelName() == 'Monitor'"
          :text-group-name="
            component.product_type_cro +
            ' ' +
            component.manufacturer.name +
            ' ' +
            component.model
          "
          :text-group-items="[
            'Dijagonala: ' + component.size + '\'\'',
            'Osvježavanje slike: ' + component.refresh_rate + 'Hz',
          ]"
        />
        <PCPartCardList
          v-if="getModelName() == 'Keyboard'"
          :text-group-name="
            component.product_type_cro +
            ' ' +
            component.manufacturer.name +
            ' ' +
            component.model
          "
          :text-group-items="[
            'Vrsta : ' + component.type,
            'Switchevi: ' + component.switch_type.name,
            'Spajanje: ' + component.connector,
          ]"
        />
        <PCPartCardList
          v-if="getModelName() == 'Storage'"
          :text-group-name="
            component.product_type_cro +
            ' ' +
            component.manufacturer.name +
            ' ' +
            component.model
          "
          :text-group-items="[
            'Veličina: ' + component.size + ' GB',
            'Vrsta: ' + component.storage_type.name,
          ]"
        />
        <h3>Dostupno</h3>
        <h2 class="pc-part-card-price-wrapper">
          {{ `${component.price.toFixed(2)} €` }}
        </h2>
      </div>
      <div class="pc-part-card-button-wrapper">
        <Button
          @click="addToCart"
          shape="odd-shape"
          text="Dodaj u"
          :style="{
            'background-color': '#D9D9D9',
            color: '#282828',
          }"
          :icon="true"
          :is-small="true"
        />
      </div>
    </div>
  </router-link>
</template>

<script setup>
import { ref } from "vue";
import Button from "./Button.vue";
import PCPartCardList from "./PCPartCardList.vue";
import { useToast } from "vue-toastification";

const { component } = defineProps({
  component: Object,
});
const toast = useToast();
const isAlreadyInCart = ref(false);

const image =
  component.images.length === 0
    ? [
        "https://www.mobismea.com/upload/iblock/2a0/2f5hleoupzrnz9o3b8elnbv82hxfh4ld/No%20Product%20Image%20Available.png",
      ]
    : component.images[0];

const getModelName = () => {
  //console.log(JSON.parse(JSON.stringify(component)));
  const modelName = component.productable_type.replace("App\\Models\\", "");
  return modelName;
};

const addToCart = (e) => {
  e.preventDefault(); // do not redirect to product details
  const existingItems = sessionStorage.getItem("cart") || "[]";

  JSON.parse(existingItems).forEach((element) => {
    if (element.id == component.id) {
      isAlreadyInCart.value = true;
      toast.error("Ovaj se proizvod već nalazi u košarici!", {
        timeout: 2500,
      });
    }
  });

  if (isAlreadyInCart.value == false) {
    let cartItems = [];

    if (existingItems) {
      cartItems = JSON.parse(existingItems);
    }

    const currProduct = { id: component.id, quantity: 1 };
    cartItems.push(currProduct);

    sessionStorage.setItem("cart", JSON.stringify(cartItems));
    toast.success(
      `Uspješno dodan ${component.manufacturer.name} ${component.model} u košaricu!`,
      {
        timeout: 2500,
      }
    );
  }
};
</script>

<style lang="scss" scoped>
@import "../utils/theme.scss";

.pc-part-card-wrapper {
  background-color: $white-dark;
  width: 100%;
  box-shadow: 0 0 8px #eebdd6;
  outline: 3px solid transparent;
  outline-offset: -3px;
  padding: 8px 8px 0;

  .pc-part-card-image-wrapper {
    background-color: white;
    height: 32vw;
    width: 100%;
    margin-bottom: 16px;

    img {
      object-fit: contain;
      height: 100%;
      width: 100%;
    }
  }

  .pc-part-card-text-wrapper {
    h3 {
      color: $colorSuccess;
      font-size: 14px;
    }

    h2 {
      font-size: 20px;
      margin-bottom: 8px;
      color: $grey-dark;
    }
  }

  .pc-part-card-button-wrapper {
    display: flex;
    justify-content: center;
    padding-bottom: 8px;
    z-index: 1;
  }
}

.pc-part-card-link {
  text-decoration: none;
  height: 100%;
}

@media screen and ($tablet) {
  .pc-part-card-wrapper {
    padding: 12px 12px 0;
    height: 100%;
    .pc-part-card-text-wrapper {
      h3 {
        font-size: 20px;
      }

      h2 {
        font-size: 32px;
        margin-bottom: 16px;
      }
    }

    .pc-part-card-button-wrapper {
      padding-bottom: 16px;
    }
  }
}

@media screen and ($tabletLarge) {
  .pc-part-card-wrapper {
    .pc-part-card-image-wrapper {
      height: 16vw;
    }

    .pc-part-card-text-wrapper {
      h3 {
        color: $colorSuccess;
        font-size: 16px;
      }

      h2 {
        font-size: 24px;
        margin-bottom: 8px;
        color: $grey-dark;
      }
    }

    .pc-part-card-button-wrapper {
      padding-bottom: 16px;
    }
  }
}

@media screen and ($desktop) {
  .pc-part-card-wrapper {
    padding: 12px 16px 0;

    .pc-part-card-image-wrapper {
      height: 200px;
    }

    .pc-part-card-text-wrapper {
      h3 {
        font-size: 20px;
      }

      h2 {
        font-size: 32px;
      }
    }

    .pc-part-card-button-wrapper {
      padding-bottom: 16px;
    }
  }
}

.Vue-Toastification__toast-body {
  margin: auto 18px auto 0px;
}

.Vue-Toastification__close-button {
  &:hover {
    background-color: transparent;
  }
}
</style>
