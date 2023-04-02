<template>
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Players</h1>
        </div>
    </header>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <ul>
                <li :key="index" v-for="(team, index) in players">
                    <a href="#" class="player flex block max-w-sm bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <div class="flex player-description">
                            <img width="90" height="155" :src="team.image_url" alt="">
                            <h5 class="mb-2 flex items-center text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{team.fullName}}</h5>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </main>
</template>

<script lang="ts" setup>
import axiosClient from '../axios.js'
import { ref } from 'vue'

const players = ref(<Player>[])
type Player = {
    id: number,
    name: string,
    surname: string,
    fullName: string,
    team: number,
    image_url: string

}
axiosClient.get('/api/players')
    .then(response => {
        if (response.data) {
            players.value = response.data.data
        }
    })
</script>

<style lang="postcss" scoped>
.player {
    transition: transform .2s ease; /* Animation */
}
.player:hover {
    transform: scale(1.2);
}
.player-description::before {
    content: "";
    display: block;
    background-color: #2d3748;
    top: 0;
    left: 0;
    z-index: 0;
    clip-path: polygon(0 0,100% 0,68% 100%,0 100%);
    width: 60px;
    height: 100%;
}
</style>
