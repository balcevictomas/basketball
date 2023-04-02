<template>
    <div class="min-h-full">
        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">News</h1>
            </div>
        </header>
        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <div class="flex flex-col gap-8">
                    <router-link :to="{name: 'SingleNews', params: {id: singleNews.id}}" class="news"
                                 v-for="singleNews in news" to="">
                        <div class="max-w-sm w-full lg:max-w-full lg:flex">
                            <div
                                class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"
                                :style="{'background-image': 'url(' + singleNews.image_url +')'}"
                                title="Woman holding a mug">
                            </div>
                            <div
                                class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                                <div class="mb-8">
                                    <div class="text-gray-900 font-bold text-xl mb-2">{{ singleNews.title }}</div>
                                    <p class="text-gray-700 text-base">{{ singleNews.description }}</p>
                                </div>
                                <div class="flex items-center">
                                    <!--                                <img class="w-10 h-10 rounded-full mr-4" src="/img/jonathan.jpg" alt="Avatar of Jonathan Reinink">-->
                                    <div class="text-sm">
                                        <p class="text-gray-900 leading-none">{{ singleNews.author }}</p>
                                        <p v-if="singleNews.created_at" class="text-gray-600">
                                            {{ singleNews.created_at }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </router-link>
                </div>
            </div>
        </main>
    </div>
</template>

<script lang="ts" setup>
import {ref} from 'vue'
import axiosClient from '../axios.js'
import SingleNews from "./SingleNews.vue";

type News = {
    id: number,
    slug: string,
    author: string,
    title: string,
    image_url: string,
    description: string,
    created_at: string,
}
const news = ref<News[]>()

axiosClient.get('/api/news')
    .then(response => {
        if (response.data) {
            news.value = response.data.data
        }
    })
</script>

<style lang="postcss" scoped>
.news {
    transition: transform .2s ease; /* Animation */
}

.news:hover {
    transform: scale(1.2);
}
</style>
