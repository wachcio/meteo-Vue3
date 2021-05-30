<template>
  <div v-show="isLoaded || sensorsCurrent.length" class="readings">
    <div class="wrapper">
      <div v-for="n in nrOfCategory" :key="n" class="sensorTitle">
        <div v-if="n > 1" class="hrWrapper">
          <hr class="hr1" />
          <hr class="hr2" />
          <hr />
        </div>
        <h1 class="categoryTitle" @click="categoryClick(n - 1)">
          {{ h1Title(sensorsCurrent[newCategoryIndex[n - 1]]) }}
        </h1>

        <!-- <AnimateCSS enter="lightSpeedIn" leave="lightSpeedOut" appear="appear"> -->
        <div v-show="categoryVisible[n - 1]" class="sensorWrapper">
          <div v-for="(sensorCurrent, i) in sensorsToCategory(n)" :key="i">
            <Sensor :sensor-current="sensorCurrent" />
          </div>
          <AirQualityWidget v-if="n == nrOfCategory" sensorName="warszawska" />
        </div>
        <!-- </AnimateCSS> -->
      </div>
    </div>

    <Transition name="fade">
      <InfoBox v-if="showInfo" />
    </Transition>
  </div>
</template>

<script>
// import Vue from "vue";
import { mapState, mapMutations, mapActions } from 'vuex';
import Sensor from './Sensor.vue';
import InfoBox from './InfoBox.vue';

import AirQualityWidget from './AirQualityWidget.vue';
import AnimateCSS from '../CSS/AnimateCSS.vue';

export default {
  name: 'SensorCategory',
  components: {
    Sensor,
    InfoBox,
    AirQualityWidget,
    AnimateCSS,
  },
  props: {},
  data() {
    return {
      //  newCategoryIndex: [0, 16, 30],
      newCategoryIndex: [],
      currentDate: undefined,
      // categoryVisible: [true, true, true, true],
      categoryVisible: [],
      sensorData: undefined,
      nrOfCategory: 0,
    };
  },
  computed: {
    ...mapState(['sensorsCurrent', 'isLoaded', 'showInfo', 'sensorActive']),
  },

  watch: {
    sensorsCurrent() {
      this.findCategoryFirstIndex();
      this.nrOfCategory = this.newCategoryIndex.length;

      if (this.categoryVisible.length === 0) {
        for (let i = 0; i < this.nrOfCategory; i++) {
          this.categoryVisible.push(true);
        }
      }
    },
  },

  methods: {
    ...mapMutations(['updateSensorsCurrent']),
    ...mapActions(['getCurrentJSON']),

    sensorsToCategory(categoryNr) {
      return this.sensorsCurrent.filter(function (sensor) {
        return sensor.sensorCategoryNr === categoryNr;
      });
    },

    sensorActiveData(data) {
      this.sensorData = data;
    },
    h1Title(data) {
      // console.log(data);
      if (data !== undefined) {
        // console.log("Title " + data.sensorCategoryTitle);
        // console.log(data);
        return data.sensorCategoryTitle;
      }
      return null;
    },
    categoryClick(categoryIndex) {
      this.categoryVisible.splice(categoryIndex, 1, !this.categoryVisible[categoryIndex]);
    },
    findCategoryFirstIndex() {
      // eslint-disable-next-line consistent-return
      this.newCategoryIndex = this.sensorsCurrent.map(function (el, i, array) {
        if (i === 0) {
          return 0;
        }
        if (el.sensorCategoryTitle !== array[i - 1].sensorCategoryTitle) {
          return i;
        }
      });

      this.newCategoryIndex = this.newCategoryIndex.filter(function (el) {
        return el !== undefined;
      });
    },
  },
  beforeMount() {
    this.getCurrentJSON();
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
  flex-basis: 100%;
  flex-wrap: wrap;
  justify-content: center;
  transition: left 0.3s;
}
.sensorTitle {
  flex-basis: 100%;
  flex-grow: 1;
  /* display: flex; */
  /* flex-direction: column; */
  /* justify-content: center; */
  text-align: center;
  transition: 0.3s height ease-in;
}
.readings,
.sensorWrapper {
  /* display: none; */
  flex-basis: 100%;
  display: flex;
  flex-wrap: wrap;
  transition: 0.3s height ease-in;
  justify-content: center;
}
hr,
.hr2,
.hr3 {
  position: relative;
  left: 50%;
  transform: translateX(-50%);
  color: #68bafb;
  width: 70%;
  background: #68bafb;
  height: 1px;
  border: 0px;
  margin-top: 1px;
  margin-bottom: 0;
  padding: 0;
  text-align: center;
}

.hr1 {
  width: 60%;
}

.hr2 {
  width: 65%;
}
.hrWrapper {
  position: relative;
  text-align: center;
}
.hideShowSection-enter-active,
.hideShowSection-leave-active {
  transition: all 0.4s ease-in-out;
}
.hideShowSection-enter {
  transform: translateX(-100vw);
  opacity: 1;
}

.hideShowSection-leave-to {
  transform: translateX(100vw);
  opacity: 0;
}
.categoryTitle {
  cursor: pointer;
}
</style>
