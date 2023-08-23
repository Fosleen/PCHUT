<template>
  <div class="footer-parent-wrapper">
    <div class="footer-text-groups-wrapper">
      <FooterTextGroupVue
        text-group-name="O prcmanu"
        :text-group-items="[
          'Poslovnice',
          'Radno vrijeme',
          'Tražite posao?',
          'Uvjeti poslovanja',
        ]"
      />

      <FooterTextGroupVue
        text-group-name="Služba za korisnike"
        :text-group-items="[
          'Zaštita osobnih podataka',
          'Upravljanje kolačićima',
          'Izjava o privatnosti',
          'Izjava o sigurnosti',
          'Uvjeti korištenja',
        ]"
      />

      <FooterTextGroupVue
        text-group-name="Povrat i zamjena"
        :text-group-items="[
          'Prigovori',
          'Nema povrata i zamjene',
          'Knjiga žalbe',
        ]"
      />

      <FooterTextGroupVue
        text-group-name="Kontaktirajte nas"
        :text-group-items="['Instagram', 'Facebook', 'Email', '01 512']"
      />
    </div>

    <div class="footer-badges-wrapper">
      <img src="../assets/qudal_logo.png" alt="why no load" />

      <img src="../assets/best_buy_logo.png" alt="why no load" />

      <img src="../assets/best_buy_2_logo.png" alt="why no load" />
    </div>

    <div class="footer-logo-wrapper">
      <h4>Izrada web shopa</h4>
      <img
        src="../assets/fosleen-logo.png"
        alt=""
        class="footer-logo-fosleen"
      />
    </div>
  </div>
</template>

<script>
import FooterTextGroupVue from "../components/FooterTextGroup.vue";
import QudalLogo from "../assets/qudal_logo.png"; //for some reason this is not working
import BestBuyLogo from "../assets/best_buy_logo.png";
import BestBuyLogo2 from "../assets/best_buy_2_logo.png";

export default {
  components: {
    FooterTextGroupVue,
  },
};
</script>

<style lang="scss">
@import "../utils/theme.scss";
.footer-parent-wrapper {
  background-image: url("../assets/footer_img.jpg");
  padding-left: 60px;
  padding-right: 60px;
  padding-top: 40px;
  padding-bottom: 20px;
  position: relative;
  width: 100%;
  background-position: inherit;
  background-repeat: no-repeat;
  background-size: cover;
}

.footer-text-groups-wrapper {
  display: flex;
  flex-direction: column;
  color: white;
  width: 100%;
  text-align: left;
  margin-bottom: 50px;
  text-align: center;

  @media screen and ($tabletLarge) {
    flex-direction: row;
    justify-content: space-evenly;
  }
  /* display: flex;
  justify-content: space-evenly; */
}

.footer-badges-wrapper {
  height: 90px;

  display: flex;
  flex-direction: row;
  justify-content: center;
  width: 100%;
  gap: 20px;
  padding-top: 12px;
  padding-bottom: 12px;
  margin-bottom: 48px;

  @media screen and ($tabletLarge) {
    height: 200px;
  }

  img {
    height: 90px;
    z-index: 400;
    width: 90px;

    @media screen and ($tabletLarge) {
      height: 200px;
      width: 200px;
    }
  }
}

.footer-logo-wrapper {
  color: white;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
}

.footer-logo-fosleen {
  width: 120px;
  height: 32px;
}
</style>
