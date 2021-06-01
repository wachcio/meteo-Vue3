<template>
  <div id="main">
    <section id="pageTitle">Stacja meteo Rypin</section>

    <div>
      <Nav />
      <AnimateCSS enter="lightSpeedIn" leave="lightSpeedOut" appear="appear">
        <router-view v-slot="{ Component }">
          <keep-alive>
            <component :is="Component" />
          </keep-alive>
        </router-view>
      </AnimateCSS>
    </div>

    <footer>
      <hr />
      <div>Wachcio &copy; 2018-{{ getCurrentYear }}</div>
    </footer>
    <Teleport to="#endOfBody"> <Preloader v-if="!isLoaded && !sensorsCurrent.length" /></Teleport>
  </div>
</template>

<script>
import { mapState, mapMutations, mapActions, mapGetters } from 'vuex';
import Nav from './components/Nav/Nav.vue';
import Preloader from './components/Preloader.vue';
import AnimateCSS from './components/CSS/AnimateCSS.vue';

export default {
  name: 'App',
  components: {
    Nav,
    Preloader,
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
  watch: {},
  created() {
    window.addEventListener('scroll', this.handleScroll);
    this.refreshData();
  },
  unmounted() {
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

    refreshData() {
      this.$store.dispatch('getCurrentJSON');
      setTimeout(this.refreshData, 60000);
    },

    checkWindSpeed0() {
      for (const sensor of this.sensorsCurrent) {
        if (sensor.sensorName === 'Prędkość wiatru km/h') {
          if (sensor.valueCurrent.value === 0) {
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
