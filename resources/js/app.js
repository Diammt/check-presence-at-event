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
 //import Breadcrumb from 'primevue/breadcrumb';
 //import Card from 'primevue/card';
 //import Dialog from 'primevue/dialog';
 //import Dropdown from 'primevue/dropdown';
 //import MegaMenu from 'primevue/megamenu';
 //import Menu from 'primevue/menu';
import Menubar from 'primevue/menubar';
 //import MultiSelect from 'primevue/multiselect';
 //import Paginator from 'primevue/paginator';
import Toast from 'primevue/toast';
import ToastService from 'primevue/toastservice';
 //import Tooltip from 'primevue/tooltip';
 //import Ripple from 'primevue/ripple';
//
 import 'primevue/resources/themes/saga-blue/theme.css';
 import 'primevue/resources/primevue.min.css';
 import 'primeicons/primeicons.css';
//
Vue.use(ToastService);
 //Vue.directive('tooltip', Tooltip);
 //Vue.directive('ripple', Ripple);
//
 Vue.component('Button', Button);
 //Vue.component('Breadcrumb', Breadcrumb);
 //Vue.component('Card', Card);
 //Vue.component('Dialog', Dialog);
 //Vue.component('Dropdown', Dropdown);
 //Vue.component('MegaMenu', MegaMenu);
Vue.component('Menubar', Menubar);
 //Vue.component('Carousel', Carousel);
 //Vue.component('MultiSelect', MultiSelect);
 //Vue.component('Checkbox', Checkbox);
 //Vue.component('Paginator', Paginator);
Vue.component('Toast', Toast);
 //Vue.component('Tooltip', Tooltip);
 //Vue.component('Ripple', Ripple);

// notification starting
import Notifications from 'vue-notification'
Vue.use(Notifications)
// notification ending


import App from './App.vue'
import router from './router'
import VueHead from 'vue-head'

Vue.use(VueHead)

Vue.config.productionTip = false;


new Vue({
    router,
	render: h => h(App)
}).$mount('#app');
