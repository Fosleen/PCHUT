<template>
  <div class="orders-list-item-container">
    <div class="orders-list-item-left">
      <h4>#{{ props.order.id }}</h4>
      <p>
        Ukupan iznos: <b> {{ props.order.total }}</b> €
      </p>
      <p>Proizvoda: {{ props.order.quantity }}</p>
    </div>
    <div class="orders-list-item-right">
      <div class="orders-list-item-right-top">
        <div class="row">
          <PhPackage v-if="props.order.shipping == 0" :size="16" />
          <PhTruck v-if="props.order.shipping == 1" :size="16" />
          <PhCheck v-if="props.order.shipping == 2" :size="16" />
          <p v-if="props.order.shipping == 0">Obrada narudžbe</p>
          <p v-if="props.order.shipping == 1">U dostavi</p>
          <p v-if="props.order.shipping == 2">Dostavljeno</p>
        </div>

        <div class="orders-list-item-dots">
          <div class="dot coloured"></div>
          <div
            :class="{ coloured: props.order.shipping >= 1 }"
            class="line"
          ></div>
          <div
            :class="{ coloured: props.order.shipping >= 1 }"
            class="dot"
          ></div>
          <div
            :class="{ coloured: props.order.shipping == 2 }"
            class="line"
          ></div>
          <div
            :class="{ coloured: props.order.shipping == 2 }"
            class="dot"
          ></div>
        </div>
      </div>
      <p>Plaćeno</p>
    </div>
  </div>
</template>

<script setup>
import { PhTruck, PhPackage, PhCheck } from "@phosphor-icons/vue";

const props = defineProps({
  order: Object,
});
</script>

<style lang="scss">
@import "../utils/theme.scss";

.orders-list-item-container {
  display: flex;
  justify-content: space-between;
  color: $colorTextPrimary;
  padding-bottom: 12px;
  padding-top: 12px;
  border-bottom: 1px solid $colorTextSecondary;
  width: 100%;
  cursor: pointer;

  .orders-list-item-left {
    display: flex;
    flex-direction: column;
    gap: 4px;

    p {
      font-weight: 500;
    }

    p:last-child {
      font-size: 14px;
      font-weight: 400;
    }
  }

  .orders-list-item-right {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: flex-end;

    .orders-list-item-right-top {
      display: flex;
      flex-direction: column;
      align-items: flex-end;

      .row {
        display: flex;
        gap: 4px;
        align-items: center;

        p {
          font-size: 14px;
          font-weight: 500;
        }
      }

      .orders-list-item-dots {
        display: flex;
        align-items: center;
        margin-top: 4px;

        .dot {
          height: 8px;
          width: 8px;
          background-color: $grey-light;
          border-radius: 50%;
        }

        .line {
          height: 2px;
          width: 16px;
          background-color: $grey-light;
        }

        .coloured {
          background-color: $colorPrimary;
        }
      }
    }

    p:last-child {
      font-size: 14px;
      font-weight: 400;
    }
  }

  &:last-child {
    margin-bottom: 0;
    border-bottom: none;
    padding-bottom: 0;
  }
}
</style>
