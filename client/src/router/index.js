import {createRouter, createWebHistory} from "vue-router";
import Home from "../components/Home.vue";
import Dashboard from "../components/Dashboard.vue";
import Login from "../components/Authentication/Login.vue"
import Register from "../components/Authentication/Register.vue"
import store from "../store/index.js";

const routes = [
    {
        path: '/',
        redirect: '/dashboard',
        component: Dashboard,
        meta: {requiresAuth: true},
    },
    {
        path: '/login',
        name: 'Login',
        component: Login
    },
    {
        path: '/register',
        name: 'Register',
        component: Register
    },
    {
        path: '/dashboard',
        name: 'Dashboard',
        component: Dashboard,
        meta: {requiresAuth: true},
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
})

router.beforeEach((to, from, next) => {
    if (to.meta.requiresAuth && !store.state.user.token) {
        next({name: 'Login'})
    } else if (store.state.user.token && (to.name === 'Login' || to.name === 'Register')) {
        next({name: 'Dashboard'});
    } else {
        next()
    }
})
export default router;
