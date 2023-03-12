<script setup>
import Home from './components/Home.vue'
import Header from './components/Page/Header.vue'
import { useStore } from 'vuex'
import { computed } from 'vue'

// const store = useStore()
// const user = computed(() => store.state.user.token)
</script>

<template>
    <Header/>
    <router-view></router-view>
</template>

<style scoped>
.logo {
    height: 6em;
    padding: 1.5em;
    will-change: filter;
    transition: filter 300ms;
}

.logo:hover {
    filter: drop-shadow(0 0 2em #646cffaa);
}

.logo.vue:hover {
    filter: drop-shadow(0 0 2em #42b883aa);
}
</style>
