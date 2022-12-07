<script setup>
import {Link} from "@inertiajs/inertia-vue3";

defineProps(['movie'])
</script>

<template>
        <Link :href="/movie/ + movie.id">
            <div class="px-4 py-4 flex">
                <div>
                    <img class="max-h-64" :src="'https://image.tmdb.org/t/p/original' + movie.poster_path" alt="">
                </div>
                <div>
                    <h4>{{ movie.title }}</h4>
                </div>
            </div>
        </Link>
</template>


