<template>
  <div v-if="!isLoaded && !sensorsCurrent.length" id="preloader">
    <img src="../assets/preloader.png" />
  </div>
</template>

<script>
import { mapState } from "vuex";

export default {
  name: "Sensor",
  components: {},
  props: {},
  data() {
    return {};
  },
  computed: {
    ...mapState(["sensorsCurrent", "isLoaded", "showInfo", "sensorActive"])
  },
  watch: {},
  methods: {}
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
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
