import Vue from 'vue'
import App from './App.vue'
import router from './routes'
// import axios from 'axios';

// Vue.use(axios)
Vue.config.productionTip = false

new Vue({
  render: h => h(App),
  router: router,
}).$mount('#app')
