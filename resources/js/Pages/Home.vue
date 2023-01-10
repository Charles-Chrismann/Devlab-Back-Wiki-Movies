<script setup>
import Layout from "../Shared/Layout.vue";
import MovieCard from "../Shared/MovieCard.vue";
import {onMounted} from "vue";

const props = defineProps(['moviesByGenre'])

onMounted(() => {
    console.log(props.moviesByGenre)
})
</script>

<template>
    <Layout>
        <div v-for="movies of moviesByGenre" class="px-12 pt-8">
            <h2 class="mb-2 text-white text-2xl font-semibold">{{ movies.name }}</h2>
            <div class="flex overflow-x-auto">
                <MovieCard  v-for="movie of movies.movies" :movie="movie"/>
            </div>
        </div>
    </Layout>
</template>
