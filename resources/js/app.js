require("./bootstrap");
window.Vue = require("vue");

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';
import VueAxios from "vue-axios";
import axios from "axios";
import excel from 'vue-excel-export';
import Toast from "vue-toastification";
// Import the CSS or use your own!
import "vue-toastification/dist/index.css";

const options = {
    position: "top-right",
    timeout: 4000,
    closeOnClick: true,
    pauseOnFocusLoss: true,
    pauseOnHover: true,
    draggable: true,
};

// Install BootstrapVue
Vue.use(BootstrapVue);
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin);
Vue.use(VueAxios, axios);
Vue.use(excel);
Vue.use(Toast, options);


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('user-component', require('./components/Users/User').default);
Vue.component('rol-component', require('./components/Roles/Rol').default);
Vue.component('permisos-component', require('./components/Permisos/Permisos').default);
Vue.component('cartera-component', require('./components/Cartera/Index').default);
Vue.component('nomina1-component', require('./components/reportes/Nomina/Nomina1').default);
Vue.component('nomina2-component', require('./components/reportes/Nomina/Nomina2').default);
Vue.component('rrhh1-component', require('./components/reportes/RRHH/Rrhh1').default);
Vue.component('rrhh2-component', require('./components/reportes/RRHH/Rrhh2').default);



const app = new Vue({
    el: '#app',
});
