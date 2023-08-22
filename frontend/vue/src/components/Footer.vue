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
.footer-parent-wrapper {
  background-image: url("../assets/footer_img.jpg");
  height: 480px;
  padding-left: 60px;
  padding-right: 60px;
  padding-top: 40px;
  position: fixed;
  width: 100%;
  bottom: 0;

  background-position: center center;
}

.footer-text-groups-wrapper {
  display: flex;
  width: 100%;
  color: white;
  justify-content: space-evenly;
  text-align: left;
  margin-bottom: 50px;
}

.footer-badges-wrapper {
  display: flex;
  flex-direction: row;
  justify-content: center;
  width: 100%;
  height: 150px;
  gap: 20px;
  padding-top: 12px;
  padding-bottom: 12px;

  img {
    height: 150px;
    z-index: 400;
    width: 200px;
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
