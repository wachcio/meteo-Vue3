<template>
  <div class="widgets">
    <iframe
      v-if="sensorName == 'warszawska'"
      id="airly_428486066"
      :src="'https://airly.eu/map/widget.html#w=280&h=380&m=true&i=true&d=false&ah=true&aw=false&l=pl&it=AIRLY_CAQI&us=metric&ut=celsius&lat=53.062772&lng=19.411941&id=43200'"
    ></iframe>
    <iframe
      v-if="sensorName == 'cholewinskiego'"
      id="airly_874508336"
      src="https://airly.org/map/widget.html#w=280&h=380&m=true&i=true&d=false&ah=true&aw=false&l=pl&it=AIRLY_CAQI&us=metric&ut=celsius&lat=53.068923&lng=19.422556&id=18800"
    ></iframe>
  </div>
</template>

<script>
export default {
  name: 'AirQualityWidget',
  props: { sensorName: String },
  data() {
    return {};
  },
  components: {},
  watch: {
    // sensorsCurrent
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
@import '../../css/_variables.scss';
div.widgets {
  justify-content: center;
  display: flex;
  flex-direction: column;
}
iframe {
  max-width: 1200px;
  width: 85vw;
  border: none;
  margin-bottom: 20px;
  height: auto;

  &::-webkit-scrollbar {
    width: 9px;
    height: 9px;
  }
  // &::-webkit-scrollbar-button {
  //    width: 9px;
  //    height: 9px;
  // }
  &::-webkit-scrollbar-thumb {
    background: $textColor;
    border: 2px solid $textColor;
    border-radius: 24px;
  }
  &::-webkit-scrollbar-thumb:hover {
    background: $textColor;
  }
  &::-webkit-scrollbar-thumb:active {
    background: $bacgroundColor;
  }
  &::-webkit-scrollbar-track {
    background: $bacgroundColor;
    border: 1px solid $textColor;
    border-radius: 9px;
  }
  &::-webkit-scrollbar-track:hover {
    background: $bacgroundColor;
  }
  &::-webkit-scrollbar-track:active {
    background: $bacgroundColor;
  }
  &::-webkit-scrollbar-corner {
    background: transparent;
  }
}
</style>
