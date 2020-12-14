import Vue from 'vue';
import Router from 'vue-router';
import DashboardLayout from './components/DashboardLayout.vue';
import Dashboard from './components/Dashboard.vue';
import Login from './components/Login.vue';

Vue.use(Router);

export default new Router({
	routes: [
		{
			path: '/',
			component: DashboardLayout,
			children: [
				{
					path: '/',
					name: 'dashboard',
					component: Dashboard
				}
			]
		},
		{
			path: '/login',
			name: 'login',
			component: Login
		}
	],
	scrollBehavior() {
		return {x: 0, y: 0};
	}
});
