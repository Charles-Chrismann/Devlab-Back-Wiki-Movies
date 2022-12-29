<script setup>
import {Inertia} from "@inertiajs/inertia";
defineProps(['movies', 'albumInfos', 'errors'])
</script>

<template>
    <div class="">
        <h1 class="mt-5 pb-8 text-customGreen text-2xl text-center">Album : {{ albumInfos.name }}</h1>
            <p class="text-white text-xl text-center" v-if="!movies.length">Nothing Here ...</p>
            <div class="flex flex-wrap mygap">
                <div v-for="movie in movies" class="flex flex-col flex items-center text-center">
                    <p class="text-white">{{ movie.title }}</p>
                    <img class="h-34 imgSize" :src="'https://image.tmdb.org/t/p/original' + movie.poster_path" alt="">
                </div>
            </div>
    </div>
</template>

<style>

.mygap{
    gap: 40px;
}

.imgSize{
    max-width: 150px;
    height: auto;
}

</style>
