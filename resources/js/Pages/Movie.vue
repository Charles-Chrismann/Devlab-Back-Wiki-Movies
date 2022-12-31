<script setup>
import Layout from './../Shared/Layout.vue'
import {Link} from "@inertiajs/inertia-vue3";

const props = defineProps(['movie'])
console.log(props)
</script>

<template>
    <Layout>
        <Link :href="route('addmoviepage',movie.id)"  class="w-full sm:w-fit text-white bg-customGreen py-4 mt-8 px-16">+ Add to album</Link>
        {{ movie.title }}
        {{ movie.id }}
        <img :src="'https://image.tmdb.org/t/p/original' + movie.poster_path" alt="" >
    </Layout>
</template>

<style scoped>

</style>
