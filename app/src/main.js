import "@babel/polyfill";
import "mutationobserver-shim";
import Vue from "vue";
import "./plugins/bootstrap-vue";
import App from "./App.vue";
import BootstrapVue from 'bootstrap-vue';
import axios from "axios";
import VueAxios from "vue-axios";
import Chartkick from "vue-chartkick";
import Chart from "chart.js";
import Config from "../config";

const { API_URI } = Config;

Vue.use(BootstrapVue);
Vue.use(VueAxios, axios);
Vue.axios.defaults.baseURL = API_URI;
Vue.use(Chartkick.use(Chart));


Vue.config.productionTip = false;

new Vue({
  render: h => h(App)
}).$mount("#app");
