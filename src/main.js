import './css/main.scss';

import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import store from './store';

// createApp(App).provide({ endpointCurrent: 'http://meteo.wachcio.pl/API/GetJSON.php?data=current' });

createApp(App).use(router).use(store).mount('#app');
