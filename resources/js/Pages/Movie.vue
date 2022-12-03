<script setup>
import Layout from './../Shared/Layout.vue'

const props = defineProps(['movie'])
console.log(props)
</script>

<template>
    <Layout>
        {{ movie.title }}

        <img :src="'https://image.tmdb.org/t/p/original' + movie.poster_path" alt="">
    </Layout>
</template>

<style scoped>

</style>
