<template>
    <div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <div>
                <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                     alt="Your Company"/>
                <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Sign in to your
                    account</h2>
            </div>
            <form class="mt-8 space-y-6">
                <div v-if="errorMsg" class="py-3 px-5 bg-red-500 text-white rounded">
                    {{errorMsg}}
                    <span @click="errorMsg = ''">

                    </span>
                </div>
                <input type="hidden" name="remember" value="true"/>
                <div class="-space-y-px rounded-md">
                    <div>
                        <label for="email-address" class="sr-only">Email address</label>
                        <input id="email-address" name="email" type="email" autocomplete="email" required="" v-model="user.email"
                               class="relative block w-full rounded-t-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                               placeholder="Email address"/>
                    </div>
                    <div>
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" name="password" type="password" autocomplete="current-password" required="" v-model="user.password"
                               class="relative block w-full rounded-b-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                               placeholder="Password"/>
                    </div>
                    <div>
                        <input id="remember-me" type="checkbox" v-model="user.remember">
                        <label for="remember-me" class="ml-2 text-sm text-gray-900">Remember me</label>
                    </div>
                </div>

                <div class="flex justify-end">
<!--                    <div class="flex items-center">-->
<!--                        <input id="remember-me" name="remember-me" type="checkbox"-->
<!--                               class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600"/>-->
<!--                        <label for="remember-me" class="ml-2 block text-sm text-gray-900">Remember me</label>-->
<!--                    </div>-->

                    <div class="text-sm">
                        <router-link :to="{name: 'Register'}" class="font-medium text-indigo-600 hover:text-indigo-500">Don't have an acc? Register now</router-link>
                    </div>
                </div>

                <div>
                    <button type="submit"
                            @click="login"
                            class="group relative flex w-full justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
              <LockClosedIcon class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" aria-hidden="true"/>
            </span>
                        Sign in
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
// import {LockClosedIcon} from '@heroicons/vue/20/solid'
import store from '../../store/index.js'
import { useRouter } from 'vue-router'
import { ref } from 'vue'

const errorMsg = ref('')
const router = useRouter()
const user = {
    email: '',
    password: '',
    remember: false
}
function login (ev) {
    ev.preventDefault()

    store.dispatch('login', user)
        .then(() => {
            router.push({
                name: 'News'
            })
        })
        .catch(err => {
            errorMsg.value = err.response.data.error
            console.log(errorMsg.value)
        })
}
</script>
