<template>
  <div class="order-item-wrapper">
    <div class="order-item-image-wrapper">
      <div class="order-item-image">
        <img :src="image" :alt="props.item.title" />
      </div>
    </div>
    <div class="order-item-info">
      <h4>
        {{ props.item.manufacturer.name }}
        {{ props.item.model }}
      </h4>
      <div class="order-item-info-details">
        <p>{{ props.item.type }}</p>
        <div>
          <p>{{ props.item.quantity }} kom</p>
          <h3>{{ props.item.price * props.item.quantity }} €</h3>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
const image =
  props.item.img.length === 0
    ? [
        "https://www.mobismea.com/upload/iblock/2a0/2f5hleoupzrnz9o3b8elnbv82hxfh4ld/No%20Product%20Image%20Available.png",
      ]
    : props.item.img[0];

const props = defineProps({
  item: Object,
  quantity: Number,
});
</script>

<style lang="scss">
@import "../utils/theme.scss";

.order-item-wrapper {
  display: flex;
  align-items: center;
  gap: 8px;
  margin: 0 auto;
  padding-bottom: 12px;
  padding-top: 12px;
  border-bottom: 1px solid $colorTextSecondary;

  .order-item-info {
    width: 100%;
    gap: 8px;
    display: flex;
    flex-direction: column;

    .order-item-info-details {
      display: flex;
      flex-direction: row;
      justify-content: space-between;
      align-items: end;
    }

    h4 {
      font-size: 16px;
      color: $colorTextPrimary;
    }

    h3 {
      font-size: 20px;
      color: $colorTextPrimary;
    }

    p {
      font-size: 12px;
      color: $colorTextTertiary;
      text-align: right;
    }
  }

  .order-item-image-wrapper {
    background-color: $white-dark;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 80px;
    margin: 12px;
    width: 80px;

    .order-item-image {
      display: flex;
      justify-content: center;
      align-items: center;

      img {
        padding: 0px;
        width: 100%;
        height: 100%;
        max-height: 130px;
        object-fit: cover;
      }
    }
  }

  &:last-child {
    border-bottom: none;
    padding-bottom: 0;
  }
}

@media screen and ($tablet) {
  .order-item-wrapper {
    .order-item-info {
      h4 {
        font-size: 18px;
      }

      h3 {
        font-size: 20px;
      }

      p {
        font-size: 12px;
      }
    }

    .order-item-image-wrapper {
      height: 110px;
      margin: 12px;
      width: 140px;
    }
  }
}

@media screen and ($desktop) {
  .order-item-wrapper {
    max-width: 1200px;

    .order-item-info {
      h4 {
        font-size: 20px;
        max-width: 380px;
      }

      h3 {
        font-size: 24px;
      }

      p {
        margin-top: 4px;
        font-size: 16px;
      }
    }
  }
}
</style>
