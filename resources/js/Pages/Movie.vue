<script setup>
const props = defineProps(['movie'])
console.log(props)
</script>

<template>
    ttf
{{ movie.title }}

    <img :src="'https://image.tmdb.org/t/p/original' + movie.poster_path" alt="">
</template>

<style scoped>

</style>
