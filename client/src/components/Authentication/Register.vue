<template>
    <div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <div>
                <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                     alt="Your Company"/>
                <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Register</h2>
            </div>
            <form class="mt-8 space-y-6" action="#" @submit="register">
                <input type="hidden" name="remember" value="true"/>
                <div class="-space-y-px rounded-md shadow-sm">
                    <div>
                        <input id="name" name="name" type="text" autocomplete="name" required="" v-model="user.name"
                               class="relative block w-full rounded-t-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                               placeholder="Full name and surname"/>
                    </div>
                    <div>
                        <input id="email-address" name="email" type="email" autocomplete="email" required="" v-model="user.email"
                               class="relative block w-full rounded-t-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                               placeholder="Email address"/>
                    </div>
                    <div>
                        <input id="password" name="password" type="password" autocomplete="current-password" required="" v-model="user.password"
                               class="relative block w-full rounded-t-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                               placeholder="Password"/>
                    </div>
                    <div>
                        <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="current-password_confirmation" required="" v-model="user.passwordConfirmation"
                               class="relative block w-full rounded-b-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                               placeholder="Password confirmation"/>
                    </div>
                </div>

                <div>
                    <button type="submit"
                            class="group relative flex w-full justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
              <LockClosedIcon class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" aria-hidden="true"/>
            </span>
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import store from '../../store/index.js'
import { useRouter } from 'vue-router'

const router = useRouter()
const user = {
    name: '',
    email: '',
    password: '',
    passwordConfirmation: ''
}

function register (ev) {
    ev.preventDefault()

    store.dispatch('register', user)
        .then((res) => {
            router.push({
                name: 'News'
            })
        })
}
</script>
