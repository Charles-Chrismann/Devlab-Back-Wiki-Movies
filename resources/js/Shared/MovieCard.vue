<script setup>
import {Link} from "@inertiajs/inertia-vue3";

defineProps(['movie'])
</script>

<template>
    <Link :href="/movie/ + movie.id" class="card w-48 block mr-4" draggable="false">
        <div class="w-48 block"></div>
        <img class="w-48 object-cover" :src="'https://image.tmdb.org/t/p/original' + movie.poster_path" alt="" draggable="false">
        <p class="text-center text-white mt-1">{{ movie.title }}</p>
    </Link>
</template>

<style lang="scss" scoped>
.card {


    &:hover {

        & > p {
            text-decoration: underline;
        }
    }
    &:last-child {
        margin-right: 0;
    }
}
</style>
