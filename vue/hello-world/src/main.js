import Vue from 'vue'
import App from './App.vue'
import 'bootstrap/dist/css/bootstrap.min.css'
Vue.config.productionTip = true

new Vue({
  render: h => h(App),
}).$mount('#app')
