import {createStore} from "vuex";
import axiosClient from "../axios.js";

const store = createStore({
    state: {
        test: '1234',
        user: {
            data: {},
            token: sessionStorage.getItem('TOKEN'),
        }
    },
    getters: {},
    actions: {
        register({commit}, user) {
            return axiosClient.post('/api/register', user)
                .then(({data}) => {
                    commit('setUser', data);
                    return data;
                })
        },
        login({commit}, user) {
            return axiosClient.post('/api/login', user)
                .then(({data}) => {
                    commit('setUser', data);
                    return data;
                })
        }
    },
    mutations: {
        logout: state => {
            state.user.data = {};
            state.user.token = null;
        },
        setUser: (state, userData) => {
            state.user.token = userData.token;
            state.user.data = userData.user;
            sessionStorage.setItem('TOKEN', userData.token)
        }
    },
})

export default store;
