<template>
  <div class="container">
    <h1>Archiwum odczytów</h1>
    <ArchivesForm :sensors-names="sensorsNames" />
  </div>
</template>

<script>
import axios from "axios";
import { mapState, mapMutations, mapActions } from "vuex";
import ArchivesForm from "./ArchivesForm";

export default {
  name: "ArchivesMain",
  components: {
    ArchivesForm
  },
  props: {},
  data() {
    return {
      sensorsNames: [],
      endpointNames: "http://meteo.wachcio.pl/API/GetJSON.php?getSensorName=all"
    };
  },
  computed: {
    ...mapState(["sensorsCurrent", "isLoaded", "showInfo", "sensorActive"])
  },
  created() {
    if (this.sensorsNames.length === 0) {
      axios
        .get(this.endpointNames)
        // eslint-disable-next-line no-return-assign
        .then(res => (this.sensorsNames = res.data))
        .then(this.$store.commit("isLoadedChange", true));
    }
  },
  methods: {
    ...mapMutations(["updateSensorsCurrent", "isLoadedChange"]),
    ...mapActions(["getCurrentJSON"])
  }
};
</script>

<style lang="scss">
.container {
  display: flex;
  flex-direction: column;
}
</style>
