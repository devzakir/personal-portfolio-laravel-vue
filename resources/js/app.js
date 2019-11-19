import Vue from 'vue'
import App from './App.vue'
import router from './routes'
window.Vue = require('vue');
window.axios = require('axios');

// Vue.use(axios)
Vue.config.productionTip = true;

new Vue({
  render: h => h(App),
  router: router,
}).$mount('#app')
