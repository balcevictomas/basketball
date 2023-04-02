<template>
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
            <h1 v-if="singleNews" class="text-3xl font-bold tracking-tight text-gray-900">{{singleNews.title}}</h1>
        </div>
    </header>
</template>

<script lang="ts" setup>
import {useRouter} from "vue-router";
import axiosClient from '../axios.js'
import {ref} from "vue";

type News = {
    id: number,
    slug: string,
    author: string,
    title: string,
    image_url: string,
    description: string,
    created_at: string,
}

type Params = {
    id: number,
}
const singleNews = ref<News>()

const routeParams = <Params>useRouter().currentRoute.value.params

axiosClient.get('api/news/' + routeParams.id)
    .then(response => {
        if (response.data) {
            singleNews.value = response.data.data
        }
    })
</script>

<style scoped>

</style>
