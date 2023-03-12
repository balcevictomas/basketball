<template>
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Teams</h1>
        </div>
    </header>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <ul>
                <li :key="index" v-for="(team, index) in teams">
                    <a href="#" class="flex block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <img :src="team.image_url" alt="">
                        <h5 class="mb-2 flex items-center text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{team.name}}</h5>
                    </a>
                </li>
            </ul>
        </div>
    </main>
</template>

<script lang="ts" setup>
import axiosClient from '../axios.js'
import { ref } from 'vue'

const teams = ref(<Teams>[])
type Teams = {
    id: number,
    slug: string,
    name: string,
    image_url: string

}
axiosClient.get('/api/teams')
    .then(response => {
        if (response.data) {
            teams.value = response.data.data
        }
    })
</script>

<style scoped>

</style>
