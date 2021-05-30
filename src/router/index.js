import { createRouter, createWebHashHistory } from "vue-router";

// import SensorCategory from "../components/Sensor/SensorCategory";
import SensorCategory from "../components/HelloWorld.vue";
// import ArchivesMain from "../components/Archives/ArchivesMain";
// import About from "../components/About";

// const routes: Array<RouteRecordRaw> = [
const routes = [
  // {
  //   path: "/",
  //   redirect: "/current",
  // },
  {
    path: "/current",
    component: SensorCategory,
  },
  //   {
  //     path: "/archive",
  //     component: ArchivesMain,
  //   },
  //   {
  //     path: "/about",
  //     component: About,
  //   },
];

const router = createRouter({
  history: createWebHashHistory(),
  routes,
});

export default router;
