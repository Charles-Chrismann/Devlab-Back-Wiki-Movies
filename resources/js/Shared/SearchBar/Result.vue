<script setup>
import { Link } from "@inertiajs/inertia-vue3";

defineProps(['film'])
// // console.log(film.value)
// console.log("props.film.value")
// console.log(film.value)
</script>

<template>
    <Link :href="'/movie/' + film.id">
        <span>{{ film.original_title }}</span>
        <img src="" alt="">
    </Link>
</template>

<style scoped>

</style>
