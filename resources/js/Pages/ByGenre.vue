<script setup>
import {onMounted, ref} from "vue";
import {Link} from "@inertiajs/inertia-vue3";

import Layout from './../Shared/Layout.vue'
import MovieCard from './../Shared/MovieCard.vue'

defineProps(['movies', 'currentUrl'])

</script>

<template>
    <Layout>
        <div>
            <MovieCard v-for="movie of movies.results" :movie="movie" />
        </div>
        <Link :href="currentUrl + '?page=' + (parseInt(movies.page) + 1)">Next</Link>
    </Layout>
</template>


