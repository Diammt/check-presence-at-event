import Vue from 'vue';
import Router from 'vue-router';
import DashboardLayout from './components/DashboardLayout.vue';
import Dashboard from './components/Dashboard.vue';
import Login from './components/Login.vue';
import { getToken } from "@/cookies/user.js"

Vue.use(Router);

const router = new Router({
	routes: [
		{
			path: '/',
			component: DashboardLayout,
			meta: {
	          	requiresAuth: true
	      	},
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

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth)) {
    // this route requires auth, check if logged in
    // if not, redirect to login page.
    let loggedIn = false
    if(getToken()) {
        loggedIn = true
    }
    if (!loggedIn) {
      next({
        path: '/login',
        query: { redirect: to.fullPath }
      })
    } else {
      next()
    }
  } else {
    next() // make sure to always call next()!
  }
})

export default router
