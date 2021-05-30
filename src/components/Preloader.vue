<template>
  <div id="preloader">
    <img src="http://meteo.wachcio.pl/assets/preloader.png" />
  </div>
</template>

<script>
import { mapState } from 'vuex';

export default {
  name: 'Sensor',
  components: {},
  props: {},
  data() {
    return {};
  },
  computed: {
    ...mapState(['sensorsCurrent', 'isLoaded', 'showInfo', 'sensorActive']),
  },
  watch: {},
  methods: {},
};
</script>

<style lang="scss" scoped>
#preloader {
  position: fixed;
  height: 128px;
  width: 128px;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  z-index: 100;
}
</style>
