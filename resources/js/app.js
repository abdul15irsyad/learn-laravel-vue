require('./bootstrap');
import Vue from 'vue'
import VueRouter from 'vue-router'
// import VueAxios from 'vue-axios'
// import Axios from 'axios'
// import BootstrapVue from 'bootstrap-vue'
import { store } from './store'
import { routes } from './routes'
Vue.use(VueRouter)

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap/dist/js/bootstrap'

import App from './Components/App.vue'

const router = new VueRouter({
  mode: 'history',
  routes
})

router.beforeEach((to, from, next) => {
  document.title = to.meta.title
  next()
})

new Vue(Vue.util.extend({
  store,
  router
}, App)).$mount("#app");