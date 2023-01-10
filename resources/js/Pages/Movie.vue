<script setup>
import Layout from './../Shared/Layout.vue'
import {Link} from "@inertiajs/inertia-vue3";

const props = defineProps(['movie'])
console.log(props)
</script>

<template>
    <Layout>
        <div class="px-4 lg:px-12 py-8">
            <h1 class="text-center text-white text-2xl lg:text-6xl mb-4">{{ movie.title }}</h1>
            <div class="lg:flex">
                <img :src="'https://image.tmdb.org/t/p/original' + movie.poster_path" alt="" class="lg:w-96 lg:mr-6">
                <div class="flex flex-col justify-between items-center">
                    <div>
                        <h2 class="text-center text-white text-xl lg:text-3xl mt-8 mb-2">{{ movie.tagline }}</h2>
                        <p class="text-white lg:text-xl lg:pb-12">{{ movie.overview }}</p>
                        <div class="lg:flex gap-16 lg:pb-12">
                            <p class="text-white lg:text-xl">Budget: {{ movie.budget }}$</p>
                            <p class="text-white lg:text-xl">Revenue: {{ movie.revenue }}$</p>
                        </div>
                        <p class="text-white lg:text-xl text-end">Note: {{ Math.trunc(movie.vote_average * 10)/10 }}/10</p>
                    </div>
                    <Link :href="route('addmoviepage',movie.id)"  class="w-full sm:w-fit text-white bg-customGreen py-4 mt-8 px-16 inline-block text-center">+ Add to album</Link>
                </div>
            </div>
        </div>
    </Layout>
</template>

<style scoped>

</style>
