import { createRouter, createWebHashHistory, RouteRecordRaw } from "vue-router";

// import SensorCategory from "../components/Sensor/SensorCategory";
// import ArchivesMain from "../components/Archives/ArchivesMain";
// import About from "../components/About";

const routes: Array<RouteRecordRaw> = [
  {
    path: "/",
    redirect: "/current",
  },
  //   {
  //     path: "/current",
  //     component: SensorCategory,
  //   },
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
