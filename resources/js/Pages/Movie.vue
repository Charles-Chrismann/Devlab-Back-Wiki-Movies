<script setup>
import Layout from './../Shared/Layout.vue'

const props = defineProps(['movie'])
console.log(props)
</script>

<template>
    <Layout>
        <div class="relative">
            <img :src="'https://image.tmdb.org/t/p/original' + movie.belongs_to_collection.backdrop_path" alt="" class="absolute h-72 w-full object-center object-cover brightness-50">
            <div class="relative z-10 pt-16 mx-4">
                <img :src="'https://image.tmdb.org/t/p/original' + movie.poster_path" alt="" class="max-h-96 mx-auto">
                <button class="w-full bg-indigo-50 my-8 py-4 rounded-xl">Ajouter à l'album</button>
                <div>
                    <h2 class="">{{ movie.title }}</h2>
                    <p>{{ movie.overview }}</p>
                </div>
            </div>

        </div>
    </Layout>
</template>

<style scoped>

</style>
