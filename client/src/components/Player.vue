<template>
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Player info</h1>
        </div>
    </header>
    <main>
        <div v-if="player" class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <div class="flex flex-col justify-center">
                <div class="mx-auto">
                    <h1 class="text-3xl">{{player.fullName}}</h1>
                    <img width="180" height="300" :src="player.image_url" alt="">
                </div>
            </div>
        </div>
    </main>
</template>

<script lang="ts" setup>
import axiosClient from '../axios.js'
import { ref } from 'vue'
import { useRouter } from 'vue-router'

type Player = {
    id: number,
    name: string,
    surname: string,
    fullName: string,
    team: number,
    image_url: string

}
type Params = {
    id: number,
    slug: string
}
const routeParams = <Params> useRouter().currentRoute.value.params
const player = ref<Player>()

axiosClient.get('/api/player/' + routeParams.id)
    .then(response => {
        if (response.data) {
            player.value = response.data.data
        }
    })
</script>

<style scoped>

</style>
