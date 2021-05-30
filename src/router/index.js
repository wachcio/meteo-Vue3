import { createRouter, createWebHashHistory } from 'vue-router';

import SensorCategory from '../components/Sensor/SensorCategory.vue';
import ArchivesMain from '../components/Archives/ArchivesMain.vue';
import About from '../components/About.vue';

// const routes: Array<RouteRecordRaw> = [
const routes = [
  {
    path: '/',
    redirect: '/current',
  },
  {
    path: '/current',
    component: SensorCategory,
  },
  {
    path: '/archive',
    component: ArchivesMain,
  },
  {
    path: '/about',
    component: About,
  },
];

const router = createRouter({
  history: createWebHashHistory(),
  routes,
});

export default router;
