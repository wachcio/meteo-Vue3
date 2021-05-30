<template>
  <div class="widgets">
    <iframe
      id="airly_428486066"
      :src="'https://airly.eu/map/widget.html#w=280&h=380&m=false&i=true&d=false&ah=true&aw=false&l=pl&it=AIRLY_CAQI&us=metric&ut=celsius&lat=53.062772&lng=19.411941&id=43200'"
      style="width: auto; height: auto; border: none"
    ></iframe>
    <iframe
      id="airly_874508336"
      src="https://airly.org/map/widget.html#w=280&h=380&m=false&i=true&d=false&ah=true&aw=false&l=pl&it=AIRLY_CAQI&us=metric&ut=celsius&lat=53.068923&lng=19.422556&id=18800"
      style="width: auto; height: auto; border: none"
    ></iframe>
  </div>
</template>

<script>
export default {
  name: 'AirQualityWidget',
  props: {},
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
.widgets {
  justify-content: center;
  display: flex;
  flex-direction: column;
}
iframe {
  max-width: 1200px;
  width: 90vw;
  border: none;
  margin-bottom: 20px;
  /* height: 180px; */
}
</style>
