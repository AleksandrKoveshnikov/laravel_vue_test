import Vue from 'vue'
import Vuex from 'vuex'
import Element from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css';

import appStore from './store'
import App from './App.vue'


Vue.use(Vuex)
Vue.use(Element)

const store = new Vuex.Store(appStore)

Vue.config.productionTip = false

new Vue({
  store,
  render: h => h(App),
}).$mount('#app')
