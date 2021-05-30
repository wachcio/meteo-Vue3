<template>
  <div>
    <!-- <div class="sensor" @mouseenter="tooltip($event)" @click.prevent="clickSensor"> -->
    <div class="sensor" @click.prevent="clickSensor">
      <SensorTitle :sensor-current="sensorCurrent" />
      <SensorIcon :class="checkDate()" :sensor-current="sensorCurrent" />
      <SensorValues :sensor-current="sensorCurrent" />
    </div>
  </div>
</template>

<script>
import { DateTime } from 'luxon';
import { mapState, mapMutations, mapActions } from 'vuex';
import SensorTitle from './SensorTitle.vue';
import SensorIcon from './SensorIcon.vue';
import SensorValues from './SensorValues.vue';

export default {
  name: 'Sensor',
  components: {
    SensorTitle,
    SensorIcon,
    SensorValues,
  },
  props: {
    sensorCurrent: Object,
    // currentDate: Date
  },
  data() {
    return {
      upToDate: true,
      sensorHint: '',
    };
  },
  computed: {
    ...mapState(['sensorsCurrent', 'isLoaded', 'showInfo', 'sensorActive']),
  },

  watch: {
    currentDate() {
      this.tooltip();
    },
  },
  mounted() {
    this.tooltip();
  },
  methods: {
    ...mapMutations(['updateSensorsCurrent']),
    ...mapActions(['getCurrentJSON']),

    clickSensor() {
      this.$store.commit('sensorActive', this.sensorCurrent);
      this.$store.commit('showInfo', true);
    },
    diffDate(sensorDate) {
      // console.log(event);

      const i1 = DateTime.fromSQL(sensorDate);
      const i2 = DateTime.local();
      // i2 = event.timeStamp,
      const diff = i2.diff(i1, ['days', 'hours', 'minutes', 'seconds']).toObject();
      let result = '';

      if (diff.days) {
        result += `${diff.days} dni, `;
      }

      if (diff.hours) {
        result += `${diff.hours} godzin/y, `;
      }

      if (diff.minutes) {
        result += `${diff.minutes} minut/y, `;
      }

      if (diff.seconds) {
        result += `${Math.floor(diff.seconds)} sekund`;
      }

      return result;
    },

    checkDate() {
      const dtSensor = new Date(this.sensorCurrent.valueCurrent.date);
      const diff = Math.floor((new Date() - dtSensor) / 60000);
      // console.log(diff);

      let diffMinute = 4;

      if (this.sensorCurrent.sensorCategoryTitle === 'Czujnik pyłu na ul. Warszawskiej')
        diffMinute = 17;

      if (diff > diffMinute) {
        return {
          error: true,
        };
      }
      return {};
    },
    tooltip(event) {
      // console.log(event);

      return `Ostatni odczyt ${this.sensorCurrent.valueCurrent.value}${
        this.sensorCurrent.unit
      } (${this.diffDate(this.sensorCurrent.valueCurrent.date, event)} temu)`;

      // setTimeout(this.hint, 1000);
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
.wrapper {
  position: relative;
  left: 0;
  top: 0;
  margin-top: 15px;
  margin-bottom: 15px;
  text-align: center;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  transition: left 0.3s;
}
.sensor {
  margin: 10px;
  height: 320px;
  float: left;
  width: 137px;
}

.error {
  border: 0 solid red;
  border-radius: 15px;
  box-shadow: 0 0 8px 8px red;
}

.center {
  text-align: center;
}
</style>
