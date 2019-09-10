import Vue from 'vue'
import VueRouter from 'vue-router'
import VModal from 'vue-js-modal'
import App from './App.vue'
// LightBootstrap plugin
import LightBootstrap from './light-bootstrap-main'
// router setup
import routes from './routes/routes'
//axios
import axios from 'axios'
import VueAxios from 'vue-axios'
import './registerServiceWorker'
// plugin setup
Vue.use(VueRouter)
Vue.use(LightBootstrap)
Vue.use(VueAxios, axios)
Vue.use(VModal)
// configure router
const router = new VueRouter({
  routes, // short for routes: routes
  linkActiveClass: 'nav-item active',
  scrollBehavior: (to) => {
    if (to.hash) {
      return {selector: to.hash}
    } else {
      return { x: 0, y: 0 }
    }
  }
})

/* eslint-disable no-new */
new Vue({
  el: '#app',
  render: h => h(App),
  router
})
