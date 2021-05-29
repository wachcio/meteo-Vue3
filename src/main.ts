// import "./css/main.scss";
// import Vue from "vue";
// import VueRouter from "vue-router";
// import App from "./App";
// import routes from "./routes/Routes";
// import store from "./store/store";

// const router = new VueRouter({
//   // mode: "history",
//   routes
// });

// Vue.use(VueRouter);
// Vue.config.productionTip = false;

// /* eslint-disable no-new */
// new Vue({
//   el: "#app",
//   store,
//   router,
//   render: h =>
//     h(App, {
//       props: {
//         endpointCurrent:
//                "http://meteo.wachcio.pl/API/GetJSON.php?data=current"
//       }
//     })
// });

import "./css/main.scss";

import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
// import store from "./store";

// createApp(App).use(store).use(router).mount("#app");
createApp(App).use(router).mount("#app");
