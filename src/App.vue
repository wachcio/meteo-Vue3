/* eslint-disable no-restricted-syntax */
<template>
  <div id="main">
    <section id="pageTitle">Stacja meteo Rypin</section>

    <div>
      <Nav :endpoint-current="endpointCurrent" :is-loaded="isLoaded" :show-info="showInfo" />

      <AnimateCSS enter="lightSpeedIn" leave="lightSpeedOut">
        <keep-alive>
          <router-view></router-view>
        </keep-alive>
      </AnimateCSS>
    </div>

    <footer>
      <hr />
      <div>Wachcio &copy; 2018-{{ getCurrentYear }}</div>
    </footer>
    <Preloader v-if="!isLoaded && !sensorsCurrent.length" />
  </div>
</template>

<script>
// import axios from "axios";
// import SensorCategory from "./components/Sensor/SensorCategory.vue";
import { mapState, mapMutations, mapActions, mapGetters } from 'vuex';
import Nav from './components/Nav/Nav.vue';
import Preloader from './components/Preloader.vue';
// import ArchivesMain from "./components/Archives/ArchivesMain";
import AnimateCSS from './components/CSS/AnimateCSS.vue';

export default {
  name: 'App',
  components: {
    // SensorCategory,
    Nav,
    Preloader,
    // ArchivesMain,
    AnimateCSS,
  },
  props: {
    endpointCurrent: String,
  },
  data() {
    return {};
  },
  computed: {
    ...mapState(['sensorsCurrent', 'isLoaded', 'showInfo']),
    getCurrentYear() {
      const year = new Date();
      return year.getFullYear();
    },
  },
  getters: {
    ...mapGetters(['winDirectionIndex']),
  },
  watch: {
    // sensorsCurrent(newValue, oldValue) {
    //   this.checkWindSpeed0();
    // }
  },
  created() {
    window.addEventListener('scroll', this.handleScroll);
    this.refreshData();
    this.timer();
  },
  destroyed() {
    window.removeEventListener('scroll', this.handleScroll);
  },
  methods: {
    ...mapMutations(['updateSensorsCurrent']),
    ...mapActions(['getCurrentJSON']),
    handleScroll() {
      if (this.showInfo) {
        this.$store.commit('showInfo', false);
      }
    },
    timer() {
      // this.$store.commit("timer", new Date());
      // setTimeout(this.timer, 1000);
    },

    refreshData() {
      this.$store.dispatch('getCurrentJSON');
      setTimeout(this.refreshData, 60000);
    },

    checkWindSpeed0() {
      // eslint-disable-next-line no-restricted-syntax
      for (const sensor of this.sensorsCurrent) {
        if (sensor.sensorName === 'Prędkość wiatru km/h') {
          if (sensor.valueCurrent.value === 0) {
            // eslint-disable-next-line no-restricted-syntax
            // eslint-disable-next-line no-shadow
            // eslint-disable-next-line no-restricted-syntax
            for (const sensor2 of this.sensorsCurrent) {
              if (sensor2.sensorName === 'Kierunek wiatru') {
                sensor.valueCurrent.value = 'bezwietrznie';
                sensor.picture = 'assets/strzalka_przezroczysta.png';
              }
            }
          }
        }
      }
    },
  },
};
</script>

<style lang="scss"></style>
