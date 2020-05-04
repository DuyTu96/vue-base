import DashboardLayout from './components/main/DashboardLayout.vue'
import AuthLayout from './components/main/AuthLayout.vue'
import Login from './components/auth/Login.vue'
import Register from './components/auth/Register.vue'
import Dashboard from './components/dashboard/Dashboard.vue'
import Error404 from './components/Errors/404.vue'
import ListUser from './components/users/ListUser.vue'
import CreateUser from './components/users/ModelsCreateUser.vue'
import EditUser from './components/users/ModelsEditUser.vue'

export const routes = [
	{
		path: '/',
		redirect: 'login',
		component: AuthLayout,
		children: [
			{
				path: '/login',
				name: 'login',
				component: Login
			},
			{
				path: '/registion',
				name: 'registion',
				component: Register
			}
		]
	},
	{
		path: '/',
		redirect: 'dashboard',
		component: DashboardLayout,
		children: [
			{
				path: '/dashboard',
				name: 'dashboard',
				component: Dashboard
			},
			{
				path: '/listuser',
				name: 'listuser',
				component: ListUser,
			},
		]
	},
	{
		path: '/404', name: 'error404', component: Error404
	},
	{
		path: '*', redirect: '/404'
	}
];