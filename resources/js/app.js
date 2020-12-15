/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('@/components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import Button from 'primevue/button';
import Dialog from 'primevue/dialog';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Menubar from 'primevue/menubar';
import Paginator from 'primevue/paginator';
import Toast from 'primevue/toast';
import ToastService from 'primevue/toastservice';
import Toolbar from 'primevue/toolbar';
import InputText from 'primevue/inputtext';
import Card from 'primevue/card';

import 'primevue/resources/themes/saga-blue/theme.css';
import 'primevue/resources/primevue.min.css';
import 'primeicons/primeicons.css';

Vue.use(ToastService);
 //Vue.directive('tooltip', Tooltip);
 //Vue.directive('ripple', Ripple);

Vue.component('Button', Button);
Vue.component('Dialog', Dialog);
Vue.component('DataTable', DataTable);
Vue.component('Column', Column);
Vue.component('Menubar', Menubar);
Vue.component('Paginator', Paginator);
Vue.component('Toast', Toast);
Vue.component('Toolbar', Toolbar);
Vue.component('InputText', InputText);
Vue.component('Card', Card);

import App from './App.vue'
import router from './router'
import VueHead from 'vue-head'
import './vuelidate'
import store from './store'

Vue.use(VueHead)

Vue.config.productionTip = false;


new Vue({
    router,
    store,
	render: h => h(App)
}).$mount('#app');
