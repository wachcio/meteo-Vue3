<template>
  <Teleport to="#endOfBody">
    <div class="bacground" @click="clickInfo">
      <div class="info" @click="clickInfo">
        <h1>{{ sensorData.sensorName }}</h1>
        <p>{{ info(sensorData, 'current') }}</p>
        <p>{{ info(sensorData, 'max') }}</p>
        <p>{{ info(sensorData, 'min') }}</p>
      </div>
    </div>
  </Teleport>
</template>

<script>
import { DateTime } from 'luxon';

export default {
  name: 'InfoBox',
  props: {
    // sensorData: Object
  },
  data() {
    return {};
  },
  computed: {
    sensorData() {
      return this.$store.state.sensorActive;
    },
  },
  created() {
    DateTime.local();
  },
  methods: {
    clickInfo() {
      this.$store.commit('showInfo', false);
    },
    checkDate(sensorDate, minutes) {
      const dt = new Date();
      const dtSensor = new Date(sensorDate);
      const diff = Math.floor((dt - dtSensor) / 60000);

      if (minutes < diff) {
        return 'error';
      }
      return null;
    },

    diffDate(sensorDate) {
      const i1 = DateTime.fromSQL(sensorDate);
      const i2 = DateTime.local();
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
    info(sensorData, resultType) {
      let result = '';

      if (resultType === 'current') {
        result = `Aktualny odczyt: ${sensorData.valueCurrent.value} ${sensorData.unit} (${
          sensorData.valueCurrent.date
        } czyli ${this.diffDate(sensorData.valueCurrent.date)} temu)`;
      }
      if (resultType === 'max') {
        result = `Najwyższy odczyt z ostatniej doby: ${sensorData.valueMax.value} ${
          sensorData.unit
        } (${sensorData.valueMax.date} czyli ${this.diffDate(sensorData.valueMax.date)} temu)`;
      }
      if (resultType === 'min') {
        result = `Najniższy odczyt z ostatniej doby: ${sensorData.valueMin.value} ${
          sensorData.unit
        } (${sensorData.valueMin.date} czyli ${this.diffDate(sensorData.valueMin.date)} temu)`;
      }

      if (sensorData.sensorName === 'Kierunek wiatru' || sensorData.sensorName === 'Opady') {
        result = `Od ostatniego odczytu minęło: ${this.diffDate(sensorData.valueCurrent.date)}`;
      }
      if (
        (sensorData.sensorName === 'Kierunek wiatru' && resultType === 'max') ||
        (sensorData.sensorName === 'Opady' && resultType === 'max')
      ) {
        result = '';
      }
      if (
        (sensorData.sensorName === 'Kierunek wiatru' && resultType === 'min') ||
        (sensorData.sensorName === 'Opady' && resultType === 'min')
      ) {
        result = '';
      }

      return result;
    },
  },
};
</script>

<style lang="scss" scoped>
.bacground {
  display: flex;
  justify-content: center;
  align-items: center;
  left: 0;
  top: 0;
  position: fixed;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.2);

  .info {
    position: fixed;
    padding: 30px;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    background-color: #01335c;
    border-color: black;
    border-style: solid;
    border-radius: 15px;
    border-width: 1px;
    text-align: center;

    h1 {
      font-size: 1.2em;
      padding: 0;
      margin-top: 5px;
    }
    p {
      font-size: 1em;
    }
  }
}
.fade-enter-active,
.fade-leave-active {
  transition: all 0.4s linear;
}
.fade-enter,
.fade-leave-to {
  opacity: 0;
  z-index: -1;
}
</style>
