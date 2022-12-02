<script setup>
defineProps(['film'])
// // console.log(film.value)
// console.log("props.film.value")
// console.log(film.value)
</script>

<template>
    <li>
        <span>{{ film.original_title }}</span>
        <img src="" alt="">
    </li>
</template>

<style scoped>

</style>
