import { createRouter, createWebHistory } from 'vue-router'
import News from '../components/News.vue'
import Login from '../components/Authentication/Login.vue'
import Register from '../components/Authentication/Register.vue'
import store from '../store/index.js'
import Home from '../components/Home.vue'
import Teams from '../components/Teams.vue'
import Players from '../components/Players.vue'

const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home
        // meta: { requiresAuth: true }
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
        path: '/news',
        name: 'News',
        component: News
        // meta: { requiresAuth: true }
    },
    {
        path: '/teams',
        name: 'Teams',
        component: Teams
    },
    {
        path: '/players',
        name: 'Players',
        component: Players
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

// router.beforeEach((to, from, next) => {
//     // if (to.meta.requiresAuth && !store.state.user.token) {
//     //     next({ name: 'Login' })
//     // } else if (store.state.user.token && (to.name === 'Login' || to.name === 'Register')) {
//     //     next({ name: 'News' })
//     // } else {
//     //     next()
//     // }
// })
export default router
